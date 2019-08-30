<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =
            [
            ['id' => '1', 'name' => 'manager'],
            ['id' => '2', 'name' => 'employee'],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
