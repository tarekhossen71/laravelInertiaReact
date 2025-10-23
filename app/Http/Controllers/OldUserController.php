<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Traits\Base;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserFormRequest;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use UploadAble, Base;


    public function store_or_update($request){
        $collection = collect($request->validated())->except(['password','password_confirmation']);
        $created_at = $updated_at = Carbon::now();
        $created_by = $updated_by = auth()->user()->name;
        $avatar = $request->old_image;
        if($request->hasFile('image')){
            $avatar = $this->upload_file($request->file('image'),USER_AVATAR_PATH);
            if(!empty($request->old_image)){
                $this->delete_file($request->old_image,USER_AVATAR_PATH);
            }
        }

        if($request->update_id){
            $collection = $collection->merge(compact('avatar','updated_by','updated_at'));
        }else{
            $collection = $collection->merge(compact('avatar','created_by','created_at'));
        }

        if($request->password){
            $collection = $collection->merge(with(['password' => $request->password ]));
        }
        return User::updateOrCreate(['id'=>$request->update_id],$collection->all());
    }

    public function index(Request $request){
        // authorized
        Gate::authorize('app.user.index');

        if($request->ajax()){
            $getData = User::with('role')->where('role_id','!=',1)->orderBy('id','desc');
            return DataTables::eloquent($getData)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if (!empty($request->search)) {
                        $query->where('name', 'LIKE', "%$request->search%")
                            ->orWhere('email', 'LIKE', "%$request->search%")
                            ->orWhere('mobile_no', 'LIKE', "%$request->search%")
                            ->orWhere(function($query) use ($request) {
                                $query->whereHas('role', function($query) use ($request) {
                                    $query->where('name', 'LIKE', "%$request->search%");
                                });
                            });
                    }
                })
                ->addColumn('avatar', function($row){
                    return table_image(USER_AVATAR_PATH,$row->avatar,$row->name);
                })
                ->addColumn('role_name', function($row){
                    $role = $row->role ? $row->role->name : 'N/A';
                    return '<span className="badge badge-sm badge-info">'.$role.'</span>';
                })
                ->addColumn('created_at', function($row){
                    return date('Y-m-d', strtotime($row->created_at));
                })
                ->addColumn('bulk_check', function($row){
                    return table_checkbox($row->id);;
                })
                ->addColumn('action', function($row){
                    $action = '<div className="d-flex align-items-center justify-content-end">';
                    if (Gate::allows('app.user.view')) {
                    $action .= '<button type="button" className="btn-style btn-style-view view_data ml-1" data-id="' . $row->id . '"><i className="fa fa-eye"></i></button>';
                    }
                    if (Gate::allows('app.user.edit')) {
                    $action .= '<button type="button" className="btn-style btn-style-edit edit_data ml-1" data-id="' . $row->id . '"><i className="fa fa-edit"></i></button>';
                    }
                    if (Gate::allows('app.user.delete')) {
                    $action .= '<button type="button" className="btn-style btn-style-danger delete_data ml-1" data-id="' . $row->id . '" data-name="' . $row->role_name . '"><i className="fa fa-trash"></i></button>';
                    }
                    $action .= '</div>';

                    return $action;
                })
                ->rawColumns(['bulk_check','role_name','status','action','avatar'])
                ->make(true);
        }

        set_page_data('Users','User List');
        $breadcrumb = ['Users'=>''];
        $roles = Role::where('slug','!=','super-admin')->select('id','name')->get();
        return view('user.index', ['roles'=>$roles,'breadcrumb'=>$breadcrumb]);
    }

    public function store_or_update_data(UserFormRequest $request){
        if ($request->ajax()) {
            if (Gate::allows('app.user.create') || Gate::allows('app.user.edit')) {
                $result = $this->store_or_update($request);
                if($result){
                    return $this->store_message($result,$request->update_id);
                }else{
                    return $this->response_json('error','Data Cannot Save',null,204);
                }
            }else{
                return $this->response_json('error',UNAUTORIZED_BLOCK,null,204);
            }
        }
    }

    public function view(Request $request){
        if ($request->ajax()) {
            if (Gate::allows('app.user.view')){
                $user = User::find($request->id);
                return view('user.details',compact('user'));
            }else{
                return $this->response_json('error',UNAUTORIZED_BLOCK,null,204);
            }
        }else{
            return $this->response_json('error',null,null,401);
        }
    }

    public function edit(Request $request){
        if ($request->ajax()) {
            if (Gate::allows('app.user.edit')){
                $data = User::find($request->id);
                if($data->count()){
                    return $this->response_json('success',null,$data,201);
                }else{
                    return $this->response_json('error','No Data Found',null,204);
                }
            }else{
                return $this->response_json('error',UNAUTORIZED_BLOCK,null,204);
            }
        }

    }

    public function delete(Request $request){
        if ($request->ajax()) {
            if (Gate::allows('app.user.delete')){
                $result = User::find($request->id);
                if($result){
                    if ($result->avatar) {
                        $this->delete_file($result->avatar,USER_AVATAR_PATH);
                    }
                    $result->delete();
                    return $this->delete_message($result);
                }else{
                    return $this->response_json('error','Data Cannot Delete',null,204);
                }
            }else{
                return $this->response_json('error',UNAUTORIZED_BLOCK,null,204);
            }
        }else{
            return $this->response_json('error',null,null,401);
        }
    }

    public function bulk_delete(Request $request){
        if ($request->ajax()) {
            if (Gate::allows('app.user.delete')){
                $result = User::whereIn('id',$request->ids)->select('avatar')->get();
                if($result){
                    foreach ($result as $value) {
                        $this->delete_file($value->avatar,USER_AVATAR_PATH);
                    }
                    User::destroy($request->ids);
                    return $this->bulk_delete_message($result);
                }else{
                    return $this->response_json('error','Data Cannot Delete',null,204);
                }
            }else{
                return $this->response_json('error',UNAUTORIZED_BLOCK,null,204);
            }
        }else{
            return $this->response_json('error',null,null,401);
        }
    }
}
