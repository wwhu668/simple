<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 50)->make();
        User::insert($users->makeVisible(['password', 'remember_token', 'created_at', 'updated_at'])->toArray());

        $user = User::find(1);
        $user->name = 'wwhu668';
        $user->email = 'wwhu@163.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}
