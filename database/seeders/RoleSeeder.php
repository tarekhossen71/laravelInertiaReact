<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        Role::updateOrCreate(['name' => 'Super Admin', 'slug' => 'super-admin','created_by'=>'Admin'])
            ->permissions()
            ->sync($permissions->pluck('id'));

        Role::updateOrCreate(['name' => 'Admin', 'slug' => 'admin','created_by'=>'Admin'])
            ->permissions()
            ->sync($permissions->pluck('id'));
    }
}
