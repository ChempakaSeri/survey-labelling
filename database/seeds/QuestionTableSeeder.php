<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Survey;
use App\Models\Question;
use App\Models\QuestionRecipient;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->delete();
        DB::table('question_recipient')->delete();
        $index = 0;

        $users = User::all()->pluck('id');
        $user_size = count($users);

        $surveys = Survey::all()->pluck('id');
        $survey_size = count($surveys);

        $directory = 'database/data/tweet_2020.json';
        $json = File::get($directory);
        $questions = json_decode($json);

        foreach($questions as $question) {
            $questionModel = Question::create([
                'question' => $question->tweet,
                'survey_id' => $surveys[$index],
            ]);

            $recipient_users = User::where('survey_id', $surveys[$index])->get();

            foreach($recipient_users as $recipient_user) {
                QuestionRecipient::create([
                    'question_id' => $questionModel->id,
                    'survey_id' => $surveys[$index],
                    'user_id' => $recipient_user->id,
                    'is_answer' => 0,
                ]);

            }

            $index += 1;

            if($index >= $survey_size) {
                $index = 0;
            }
        }
    }
}
