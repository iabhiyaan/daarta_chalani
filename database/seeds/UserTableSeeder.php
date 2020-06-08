<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            $user = [
                [
                    'name' => 'दर्ता चलानी',
                    'email' => 'info@admin.com',
                    'password' => bcrypt('admin123'),
                    'roles' => 'admin',
                    'status' => 'Active'
                ],
                [
                    'name' => 'DC controller',
                    'email' => 'info@controller.com',
                    'password' => bcrypt('controller123'),
                    'roles' => 'controller',
                    'status' => 'Active'
                ],
                [
                    'name' => 'DC user',
                    'email' => 'info@user.com',
                    'password' => bcrypt('secret'),
                    'roles' => 'staff',
                    'status' => 'Active'
                ],
            ];

            User::insert($user);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
