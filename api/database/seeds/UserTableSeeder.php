<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_client = Role::where('name', 'client')->first();

        $admin = new User();
        $admin->name = 'Test Admin';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $client = new User();
        $client->name = 'Test Client';
        $client->email = 'client@test.com';
        $client->password = bcrypt('password');
        $client->save();
        $client->roles()->attach($role_client);
    }
}
