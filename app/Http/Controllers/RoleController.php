<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Traits\Base;
use Inertia\Inertia;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    use Base;

    public function index(Request $request){
        // authorized
        Gate::authorize('app.role.index');

        // Base query
        $query = Role::with('permissions')
            ->where('slug', '!=', 'super-admin')
            ->orderBy('id', 'asc');

        // Filter by search text
        if ($request->filled('search_text')) {
            $query->where('name', 'LIKE', "%{$request->search_text}%");
        }

        // Paginate, 10 per page
        $roles = $query->paginate(10)->through(function($role) {
            return [
                'id' => $role->id,
                'name' => $role->name,
                'permission_count' => $role->permissions->count(),
                'created_at' => $role->created_at->format('Y-m-d'),
            ];
        });
        // dd($roles);
        return Inertia::render('Roles/Index', [
            'roles' => $roles,
            'filters' => $request->only('search_text'),
            'pageTitle' => 'Roles',
        ]);
    }

    public function create(){
        // authorized
        Gate::authorize('app.role.create');
        $modules = Module::with('permissions')->get();

        return Inertia::render('Roles/Create', [
            'pageTitle' => 'Roles Create',
            'modules' => $modules
        ]);
    }

    public function store(Request $request){
        // authorized
        Gate::authorize('app.role.create');

        // validate rules
        $request->validate([
            'name'         => ['required','string','max:20','unique:roles,name'],
            'permission' => ['required','array']
        ]);

        Role::create([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'created_by' => auth()->user()->name,
        ])->permissions()->sync($request->permission);

        return redirect()->route('app.role.index')->with('success','Role has been saved successfull.');
    }

    public function edit($id){
        // authorized
        Gate::authorize('app.role.edit');

        $role = Role::with('permissions')->findOrfail($id);
        $modules = Module::with('permissions')->get();

        return Inertia::render('Roles/Edit', [
            'pageTitle' => 'Roles Edit',
            'modules' => $modules,
            'role' => $role
        ]);
    }

    public function update(Request $request,$id){
        // authorized
        Gate::authorize('app.role.edit');

        // validate rules
        $request->validate([
            'name'         => ['required','string','max:20','unique:roles,name,'.$id],
            'permission'   => ['required','array']
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'updated_by' => auth()->user()->name
        ]);

        $role->permissions()->sync($request->permission);

        return redirect()->route('app.role.index')->with('success','Role has been updated successfull.');
    }

    public function delete(Request $request){
        if (!Gate::allows('app.role.delete')) {
            return redirect()->back()->with('error', 'Unauthorized Block!');
        }

        $role = Role::with('permissions')->find($request->id);

        if (!$role) {
            return redirect()->back()->with('error', 'Data Cannot Delete');
        }

        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('app.role.index')->with('success', 'Role and its permissions have been deleted successfully');
    }


    public function bulk_delete(Request $request){
        if (!Gate::allows('app.role.bulk-delete')) {
            return redirect()->back()->with('error','Unauthorized Block!');
        }

        $roles = Role::with('permissions')->whereIn('id', $request->ids)->get();

        foreach($roles as $role){
            $role->permissions()->detach(); // Remove associated permissions
            $role->delete();
        }

        return redirect()->back()->with('success','Selected roles and their permissions have been deleted successfully');
    }
}
