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

        // Product Permission
        $productModule = Module::updateOrCreate(['name'=>'Product Manage'],['name'=>'Product Manage']);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'Access',
            'slug'=>'app.product.index'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'Create',
            'slug'=>'app.product.create'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'Edit',
            'slug'=>'app.product.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'View',
            'slug'=>'app.product.view'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'Delete',
            'slug'=>'app.product.delete'
        ]);
        Permission::updateOrCreate([
            'module_id'=>$productModule->id,
            'name'=>'Bulk Delete',
            'slug'=>'app.product.bulk-delete'
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

    }
}
