<?php

use Illuminate\Database\Seeder;
use GestorBackend\User;
use GestorBackend\Role;

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

        $user = new User();
        $user->name = 'Orlando Luna';
        $user->email = 'luna.orlando10@gmail.com';
        $user->password = bcrypt('Bohorques15');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
