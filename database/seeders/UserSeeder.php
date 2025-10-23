<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superRole = Role::where('slug','super-admin')->first();
        User::create([
            'role_id'    => $superRole->id,
            'name'       => 'Super Admin',
            'email'      => 'super@gmail.com',
            'password'   => 12345678,
            'mobile_no'  => '01814485175',
            'created_by' => 'Super Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $adminRole = Role::where('slug','admin')->first();
        User::create([
            'role_id'    => $adminRole->id,
            'name'       => 'Admin',
            'email'      => 'admin@gmail.com',
            'password'   => 12345678,
            'created_by' => 'Super Admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
