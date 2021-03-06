<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Survey;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = File::get('database/data/user/namelist_2020.json');
        $users = json_decode($json);
        $surveys = Survey::all()->pluck('id');

        $survey_size = count($surveys);

        $index = 0;

        foreach($users as $user) {
            User::create([
                'matric_no' => $user->matric_no,
                'password' =>  Hash::make($user->matric_no . 'xyz'),
                'survey_id' => $surveys[$index],
                'is_admin'  => 0
            ]);

            $index += 1;

            if($index >= $survey_size) {
                $index = 0;
            }
        }
    }
}
