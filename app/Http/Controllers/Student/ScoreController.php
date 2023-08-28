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
        $validator = Validator::make($request->all(), [
            'first_semester' => 'required',
            'second_semester' => 'required',
            'type_class' => 'required|in:7,8,9',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $classMappings = [
            '7' => 'seven',
            '8' => 'eight',
            '9' => 'nine',
        ];

        $type_class = $classMappings[$request->type_class] ?? 'seven';

        try {
            DB::beginTransaction();

            $user_id = Auth::user()->id;
            $data_score = [
                'first_semester' => $request->first_semester,
                'second_semester' => $request->second_semester,
                'type_class' => $type_class,
            ];

            StudentScore::updateOrCreate(
                ['user_id' => $user_id, 'type_class' => $type_class],
                $data_score
            );

            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data nilai.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
