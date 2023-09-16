<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentScore;
use Illuminate\Http\Request;
use Auth;
use Alert;
use DB;
use Validator;

class ScoreController extends Controller
{
    public function createOrUpdateScore(Request $request)
    {

        try {
            DB::beginTransaction();

            $user_id = Auth::user()->id;
            if($request->first_semester_7
                || $request->second_semester_7){
                    $data_score_seven = [
                        'first_semester' => $request->first_semester_7,
                        'second_semester' => $request->second_semester_7,
                        'type_class' => 'seven',
                    ];
        
                    StudentScore::updateOrCreate(
                        ['user_id' => $user_id, 'type_class' => 'sevent'],
                        $data_score_seven
                    );
            }
            if($request->first_semester_8
                || $request->second_semester_8){
                $data_score_eight = [
                    'first_semester' => $request->first_semester_8,
                    'second_semester' => $request->second_semester_8,
                    'type_class' => 'eight',
                ];

                StudentScore::updateOrCreate(
                    ['user_id' => $user_id, 'type_class' => 'eightt'],
                    $data_score_eight
                );
            }
            if($request->first_semester_9
                || $request->second_semester_9){
                $data_score_nine = [
                    'first_semester' => $request->first_semester_9,
                    'second_semester' => $request->second_semester_9,
                    'type_class' => 'nine',
                ];

                StudentScore::updateOrCreate(
                    ['user_id' => $user_id, 'type_class' => 'ninet'],
                    $data_score_nine
                );
            }

            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data nilai.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
