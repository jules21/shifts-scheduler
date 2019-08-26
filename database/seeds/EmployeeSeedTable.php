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
            ['id' => '1', 'username' => 'Manager', 'email' => 'manager@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '1'],

            ['id' => '2', 'username' => 'employee', 'email' => 'employee@mrhotel.rw', 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'role_id' => '2'],

        ];

        foreach ($users as $user) {
            $new_user = User::create($user);
        }
        return $new_user;
    }
}
