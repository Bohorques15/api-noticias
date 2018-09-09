<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Creacion de roles
        $this->call(RoleTableSeeder::class);
        //Creacion de administrador
        $this->call(UserTableSeeder::class);
    }
}
