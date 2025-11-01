<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\Base;
use Inertia\Inertia;
use App\Models\Module;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use Base, UploadAble;

    public function index(Request $request){
        // authorized
        Gate::authorize('app.user.index');

        // Base query
        $query = User::with('role')
            ->where('role_id', '!=', 1)
            ->orderBy('id', 'asc');

        // Filter by search text
        if ($request->filled('search_text')) {
            $query->where('name', 'LIKE', "%{$request->search_text}%");
        }

        // Paginate, 10 per page
        $users = $query->paginate(10)->through(function($value) {
            return [
                'id'         => $value->id,
                'name'       => $value->name,
                'email'      => $value->email,
                'role'       => $value->role->name,
                'mobile_no'  => $value->mobile_no ?? '',
                'avatar'     => $value->avatar ? asset('uploads/users/'.$value->avatar) : '',
                'created_at' => $value->created_at->format('Y-m-d'),
            ];
        });
        // dd($users);
        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => $request->only('search_text'),
            'pageTitle' => 'Users',
        ]);
    }

    public function create(){
        // authorized
        Gate::authorize('app.user.create');
        $roles = Role::where('slug', '!=', 'super-admin')->get();

        return Inertia::render('Users/Create', [
            'pageTitle' => 'Users Create',
            'roles' => $roles,
            'genders' => GENDER
        ]);
    }

    public function store(UserRequest $request){
        // authorized
        Gate::authorize('app.user.create');
        // dd($request->all());
        $collection = collect($request->validated())->except(['password','password_confirmation']);
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = 'uploads/users/'.$this->upload_file($request->avatar, 'users/');
        }
        $collection = $collection->merge([
            'password' => bcrypt($request->password),
            'created_by' => auth()->user()->name,
            'avatar' => $avatar
        ]);

        User::create($collection->all());

        return redirect()->route('app.user.index')->with('success','User has been saved successfull.');
    }

    public function edit($id){
        // authorized
        Gate::authorize('app.user.edit');

        $roles = Role::where('slug', '!=', 'super-admin')->get();
        $user = User::find($id);
        $user = [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'role_id'    => $user->role_id,
            'mobile_no'  => $user->mobile_no,
            'avatar'     => $user->avatar,
            'preview'    => $user->avatar ? 'uploads/users/'.$user->avatar : '',
            'gender'     => $user->gender,
        ];
        return Inertia::render('Users/Edit', [
            'pageTitle' => 'Users Edit',
            'roles'     => $roles,
            'genders'   => GENDER,
            'user'      => $user
        ]);
    }

    public function update(UserRequest $request,$id){
        // authorized
        Gate::authorize('app.user.edit');

        $collection = collect($request->validated())->except(['password','password_confirmation']);
        $user = User::find($id);
        $avatar = $request->old_image;
        // dd($request->all());
        if ($request->hasFile('avatar')) {
            $avatar = 'uploads/users/'.$this->upload_file($request->avatar, 'users/');

            if(!empty($request->old_image)){
                $this->delete_file($user->avatar, 'users/');
            }
        }

        if($request->password){
            $collection = $collection->merge(with(['password' => $request->password ]));
        }

        $collection = $collection->merge([
            'created_by' => auth()->user()->name,
            'avatar' => $avatar
        ]);

         $user->update($collection->all());

        return redirect()->route('app.user.index')->with('success','User has been updated successfull.');
    }

    public function delete(Request $request){
        if (!Gate::allows('app.user.delete')) {
            return redirect()->back()->with('error', 'Unauthorized Block!');
        }

        $user = User::find($request->id);
        if ($user->avatar) {
            $this->delete_file($user->avatar,'users/');
        }

        if (!$user) {
            return redirect()->back()->with('error', 'Data Cannot Delete');
        }

        $user->delete();

        return redirect()->route('app.user.index')->with('success', 'User have been deleted successfully');
    }


    public function bulk_delete(Request $request){
        if (!Gate::allows('app.user.bulk-delete')) {
            return redirect()->back()->with('error','Unauthorized Block!');
        }

        $users = User::whereIn('id', $request->ids)->get();

        foreach($users as $user){
            if ($user->avatar) {
                $this->delete_file($user->avatar,'users/');
            }
            $user->delete();
        }

        return redirect()->back()->with('success','Selected users have been deleted successfully');
    }
}
