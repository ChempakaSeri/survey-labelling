<?php

use Illuminate\Database\Seeder;
use App\Models\Survey;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey')->delete();
        // $json = File::get('database/data/survey.json');
        // $data = json_decode($json);

        // $surveys = [
        //     'set_01',
        //     'set_02',
        //     'set_03',
        //     'set_04',
        //     'set_05',
        //     'set_06',
        //     'set_07',
        //     'set_08',
        //     'set_09',
        //     'set_10',
        //     'set_11',
        //     'set_12',
        //     'set_13',
        //     'set_14',
        // ];

        // foreach($surveys as $survey) {
        //     Survey::create([
        //         'survey_set' => $survey,
        //     ]);
        // }

        for($i = 1; $i <= 42; $i++) {
            Survey::create([
                'survey_set' => ($i < 10 ? 'set_0' : 'set_') . $i,
            ]);
        }
    }
}
