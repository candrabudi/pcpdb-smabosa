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

    public function storePresence($request, $classType)
    {
        $rules = [
            "{$classType}_sick_one" => 'required',
            "{$classType}_permission_one" => 'required',
            "{$classType}_alpa_one" => 'required',
            "{$classType}_sick_two" => 'required',
            "{$classType}_permission_two" => 'required',
            "{$classType}_alpa_two" => 'required',
        ];

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

            $presenceData = [
                'sick_one' => $request->input("{$classType}_sick_one"),
                'permission_one' => $request->input("{$classType}_permission_one"),
                'alpa_one' => $request->input("{$classType}_alpa_one"),
                'sick_two' => $request->input("{$classType}_sick_two"),
                'permission_two' => $request->input("{$classType}_permission_two"),
                'alpa_two' => $request->input("{$classType}_alpa_two"),
            ];

            $check = StudentPresence::where('user_id', $user_id)
                ->where('type_class', $classType)
                ->first();

            if ($check) {
                $check->update($presenceData);
            } else {
                $storeData = array_merge($presenceData, [
                    'user_id' => $user_id,
                    'type_class' => $classType,
                ]);
                StudentPresence::create($storeData);
            }

            DB::commit();
            Alert::success('Yay!', "Berhasil Merubah data absensi kelas {$classType}.");
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
