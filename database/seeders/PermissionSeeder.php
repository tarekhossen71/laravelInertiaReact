<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        $dashboardModule = Module::updateOrCreate(['name'=>'Dashboard'],['name'=>'Dashboard']);
        Permission::updateOrCreate([
            'module_id'=>$dashboardModule->id,
            'name'=>'Access',
            'slug'=>'app.dashboard'
        ]);

        // Role Permission
        $userModule = Module::updateOrCreate(['name'=>'Role Manage'],['name'=>'Role Manage']);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Access',
            'slug'=>'app.role.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Create',
            'slug'=>'app.role.create'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Edit',
            'slug'=>'app.role.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Delete',
            'slug'=>'app.role.delete'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Bulk Delete',
            'slug'=>'app.role.bulk-delete'
        ]);

        // User Permission
        $userModule = Module::updateOrCreate(['name'=>'User Manage'],['name'=>'User Manage']);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Access',
            'slug'=>'app.user.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Create',
            'slug'=>'app.user.create'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Edit',
            'slug'=>'app.user.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'View',
            'slug'=>'app.user.view'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Delete',
            'slug'=>'app.user.delete'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$userModule->id,
            'name'=>'Bulk Delete',
            'slug'=>'app.user.bulk-delete'
        ]);

        // Setting Permission
        $appointmentModule = Module::updateOrCreate(['name'=>'Setting Manage'],['name'=>'Setting Manage']);
        Permission::updateOrCreate([
            'module_id'=>$appointmentModule->id,
            'name'=>'Access',
            'slug'=>'app.setting.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$appointmentModule->id,
            'name'=>'Edit',
            'slug'=>'app.setting.edit'
        ]);

        // Subscription Permission
        $subcriptionModule = Module::updateOrCreate(['name'=>'Subscription Manage'],['name'=>'Subscription Manage']);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'Access',
            'slug'=>'app.subcription.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'Create',
            'slug'=>'app.subcription.create'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'Edit',
            'slug'=>'app.subcription.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'View',
            'slug'=>'app.subcription.view'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'Delete',
            'slug'=>'app.subcription.delete'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$subcriptionModule->id,
            'name'=>'Bulk Delete',
            'slug'=>'app.subcription.bulk-delete'
        ]);

        // Plan Permission
        $planModule = Module::updateOrCreate(['name'=>'Plan Manage'],['name'=>'Plan Manage']);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'Access',
            'slug'=>'app.plan.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'Create',
            'slug'=>'app.plan.create'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'Edit',
            'slug'=>'app.plan.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'View',
            'slug'=>'app.plan.view'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'Delete',
            'slug'=>'app.plan.delete'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$planModule->id,
            'name'=>'Bulk Delete',
            'slug'=>'app.plan.bulk-delete'
        ]);
    }
}
