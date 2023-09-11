<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentPresence;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Alert;

class PresenceController extends Controller
{

    public function settingPresenceSeven(Request $request)
    {
        return $this->storePresence($request, 'seven');
    }

    public function settingPresenceEight(Request $request)
    {
        return $this->storePresence($request, 'eight');
    }

    public function settingPresenceNine(Request $request)
    {
        return $this->storePresence($request, 'nine');
    }

    public function storePresence(Request $request)
    {
        $rules = [
            "seven_sick_one" => 'required',
            "seven_permission_one" => 'required',
            "seven_alpa_one" => 'required',
            "seven_sick_two" => 'required',
            "seven_permission_two" => 'required',
            "seven_alpa_two" => 'required',

            "eight_sick_one" => 'required',
            "eight_permission_one" => 'required',
            "eight_alpa_one" => 'required',
            "eight_sick_two" => 'required',
            "eight_permission_two" => 'required',
            "eight_alpa_two" => 'required',

            "nine_sick_one" => 'required',
            "nine_permission_one" => 'required',
            "nine_alpa_one" => 'required',
            "nine_sick_two" => 'required',
            "nine_permission_two" => 'required',
            "nine_alpa_two" => 'required',
        ];
// return $request;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.' . $request);
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }

        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;

            $presenceDataSeven = [
                'sick_one' => $request->input("seven_sick_one"),
                'permission_one' => $request->input("seven_permission_one"),
                'alpa_one' => $request->input("seven_alpa_one"),
                'sick_two' => $request->input("seven_sick_two"),
                'permission_two' => $request->input("seven_permission_two"),
                'alpa_two' => $request->input("seven_alpa_two"),
            ];

            $checkSeven = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'seven')
                ->first();

            if ($checkSeven) {
                $checkSeven->update($presenceDataSeven);
            } else {
                $storeData = array_merge($presenceDataSeven, [
                    'user_id' => $user_id,
                    'type_class' => 'seven',
                ]);
                StudentPresence::create($storeData);
            }

            $presenceDataEight = [
                'sick_one' => $request->input("eight_sick_one"),
                'permission_one' => $request->input("eight_permission_one"),
                'alpa_one' => $request->input("eight_alpa_one"),
                'sick_two' => $request->input("eight_sick_two"),
                'permission_two' => $request->input("eight_permission_two"),
                'alpa_two' => $request->input("eight_alpa_two"),
            ];

            $checkEight = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'eight')
                ->first();
            if ($checkEight) {
                // return $presenceDataEight;
                $checkEight->update($presenceDataEight);
            } else {
                $storeData = array_merge($presenceDataEight, [
                    'user_id' => $user_id,
                    'type_class' => 'eight',
                ]);
                StudentPresence::create($storeData);
            }

            $presenceDataNine = [
                'sick_one' => $request->input("nine_sick_one"),
                'permission_one' => $request->input("nine_permission_one"),
                'alpa_one' => $request->input("nine_alpa_one"),
                'sick_two' => $request->input("nine_sick_two"),
                'permission_two' => $request->input("nine_permission_two"),
                'alpa_two' => $request->input("nine_alpa_two"),
            ];

            $checkNine = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'nine')
                ->first();

            if ($checkNine) {
                $checkNine->update($presenceDataNine);
            } else {
                $storeData = array_merge($presenceDataNine, [
                    'user_id' => $user_id,
                    'type_class' => 'nine',
                ]);
                StudentPresence::create($storeData);
            }

            DB::commit();
            Alert::success('Yay!', "Berhasil Merubah data absensi kelas.");
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
