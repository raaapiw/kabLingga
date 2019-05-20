<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        $this->createRoles();
        $this->createUser();
    }

    public function createRoles()
    {
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'SuperAdmin',
                'slug'        => 'superAdmin',
            ]
        );
        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Admin',
                'slug'        => 'admin',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Bapenda',
                'slug'        => 'bapenda',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Client',
                'slug'        => 'client',
            ]
        );

        Sentinel::getRoleRepository()->createModel()->create
        (
			[
				'name'        => 'Supervisor',
                'slug'        => 'supervisor',
            ]
        );
    }

    public function createUser()
    {
        $this->createDefaultSuperAdmin();
        $this->createDefaultAdmin();
        $this->createDefaultBapenda();
        $this->createDefaultClient();
        $this->createDefaultSupervisor();
        $this->createDefaultSupervisor2();
        $this->createDefaultSupervisor3();
        
        $roleArray = array("admin", "client", "supervisor");
        foreach(range(0,10) as $index){
            $faker = Faker::create();
            $credentials = [
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => 'qwerty123',
                'name' => $faker->name,
                'gender' => 'M',
            ];

            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug($roleArray[array_rand($roleArray)]);
            $user->roles()->attach($role);
        }

        foreach(range(0,10) as $index){
            $faker = Faker::create();
            $credentials = [
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => 'qwerty123',
                'name' => $faker->name,
                'gender' => 'M',
            ];

            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug('bapenda');
            $user->roles()->attach($role);
        }
    }

    public function createDefaultSuperAdmin(){
        $credentials = [
            'username' => 'superAdmin',
			'email' => 'superAdmin@example.com',
            'password' => 'qwerty123',
            'name' => 'SuperAdmin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('superAdmin');
        $user->roles()->attach($role);
    }

    public function createDefaultAdmin(){
        $credentials = [
            'username' => 'admin',
			'email' => 'verifikasismelter.ptsi@gmail.com',
            'password' => 'qwerty123',
            'name' => 'Admin',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }

    public function createDefaultClient(){
        $credentials = [
            'username' => 'client',
			'email' => 'client@example.com',
            'password' => 'qwerty123',
            'name' => 'Client',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('client');
        $user->roles()->attach($role);
    }
    
    public function createDefaultBapenda(){
        $credentials = [
            'username' => 'bapenda',
			'email' => 'bapenda@example.com',
            'password' => 'qwerty123',
            'name' => 'Bapenda',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('bapenda');
        $user->roles()->attach($role);
    
    
    }

    public function createDefaultSupervisor(){
        $credentials = [
            'username' => 'Supervisor',
			'email' => 'spv@a.co.id',
            'password' => 'qwerty123',
            'name' => 'Supervisor',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('supervisor');
        $user->roles()->attach($role);
    
    
    }

    public function createDefaultSupervisor2(){
        $credentials = [
            'username' => 'Supervisor2',
			'email' => 'spv@a2.co.id',
            'password' => 'qwerty123',
            'name' => 'Supervisor2',
            'gender' => 'M',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('supervisor');
        $user->roles()->attach($role);
    
    
    }


    public function createDefaultSupervisor3(){
        $credentials = [
            'username' => 'Supervisor3',
			'email' => 'spv@a3.co.id',
            'password' => 'qwerty123',
            'name' => 'Supervisor3',
            'gender' => 'F',
		];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('supervisor');
        $user->roles()->attach($role);
    
    
    }

}
