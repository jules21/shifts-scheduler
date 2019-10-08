<?php

use App\User;
use Illuminate\Database\Seeder;

class EmployeeSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
            [
            ['id' => '4', 'username' => 'Manager', 'email' => 'manager@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '1', 'department_id' => '100', 'position_id' => '100'],

            ['id' => '2', 'username' => 'employee', 'email' => 'employee@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '3'
                , 'index' => '1'],

            ['id' => '1', 'username' => 'employee2', 'email' => 'employee2@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '3'
                , 'index' => '2'],

            ['id' => '3', 'username' => 'employee3', 'email' => 'employee3@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '3'
                , 'index' => '3'],
            ['id' => '20', 'username' => 'employee7', 'email' => 'employee7@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '3'
                , 'index' => '4'],

            ['id' => '5', 'username' => 'employee4', 'email' => 'employee4@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '4', 'index' => '1'],

            ['id' => '6', 'username' => 'employee5', 'email' => 'employee5@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '4', 'index' => '2'],

            ['id' => '7', 'username' => 'employee6', 'email' => 'employee6@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '4', 'index' => '3'],

            ['id' => '12', 'username' => 'employee12', 'email' => 'employee12@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2', 'department_id' => '2', 'position_id' => '4', 'index' => '4'],

        ];

        foreach ($users as $user) {
            $new_user = User::create($user);
        }
        return $new_user;
    }
}
