<?php

use App\User;
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
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');
        $user->admin = true;
        $user->save();

        $user = new User();
        $user->name = 'Student';
        $user->course_id = 1;
        $user->email = 'student@student.com';
        $user->password = Hash::make('password');

        $letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
        $student_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

        $user->student_id = $student_id;
        $user->save();
    }
}
