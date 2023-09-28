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
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
            $classTypes = ['seven', 'eight', 'nine'];

            foreach ($classTypes as $classType) {
                $sickField = "{$classType}_sick_one";
                $permissionField = "{$classType}_permission_one";
                $alpaField = "{$classType}_alpa_one";

                if ($request->input($sickField) !== null && $request->input($sickField) >= 0 || 
                $request->input($permissionField) !== null && $request->input($permissionField) >= 0 || 
                $request->input($alpaField) !== null && $request->input($alpaField) >= 0) {
                    $rules = [
                        $sickField => 'required',
                        $permissionField => 'required',
                        $alpaField => 'required',
                    ];

                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        throw new \Exception('Mohon check kembali inputan kamu.');
                    }

                    $presenceData = [
                        'sick_one' => $request->input($sickField),
                        'permission_one' => $request->input($permissionField),
                        'alpa_one' => $request->input($alpaField),
                        'sick_two' => $request->input("{$classType}_sick_two"),
                        'permission_two' => $request->input("{$classType}_permission_two"),
                        'alpa_two' => $request->input("{$classType}_alpa_two"),
                    ];

                    $checkPresence = StudentPresence::where('user_id', $user_id)
                        ->where('type_class', $classType)
                        ->first();

                    if ($checkPresence) {
                        $checkPresence->update($presenceData);
                    } else {
                        $storeData = array_merge($presenceData, [
                            'user_id' => $user_id,
                            'type_class' => $classType,
                        ]);
                        StudentPresence::create($storeData);
                    }
                }
            }

            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data absensi kelas.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.' . $e->getMessage());
        }

        return redirect()->back();
    }
}
