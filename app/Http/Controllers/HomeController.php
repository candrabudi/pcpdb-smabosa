<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentSchool;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\StudentParent;
use App\Models\StudentPresence;
use App\Models\StudentScore;
use App\Models\User;
use DB;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)
            ->first();
        return view('pages.dashboard', compact(
            'user',
            'student'
        ));
    }

    public function accountSetting()
    {
        $page = "account";
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)
            ->first();
        $student_school = StudentSchool::where('user_id', $user->id)
            ->first();
        return view('pages.account_setting',compact(
            'user',
            'student',
            'student_school',
            'page'
        ));
    }

    public function updateProfile(Request $request)
    {
        DB::beginTransaction();
        try{
            $user = Auth::user();
            $student = Student::where('user_id', $user->id)
                ->first();
            User::where('id', $user->id)->update([
                'full_name' => $request->user_full_name ?? $user->full_name,
                'email' => $request->user_email ?? $user->email,
            ]);

            $student->nisn = $request->user_nisn ?? $student->nisn;
            $student->gender = $request->user_gender ?? $student->gender;
            $student->religion = $request->user_religion ?? $student->religion;
            $student->birth_place = $request->user_birth_place ?? $student->birth_place;
            $student->birth_date = $request->user_birth_date ?? $student->birth_date;
            $student->phone_number = $request->user_phone_number ?? $student->phone_number;
            $student->whatsapp_phone = $request->user_whatsapp_phone ?? $student->whatsapp_phone;
            $student->address = $request->user_address ?? $student->address;
            $student->save();

            DB::commit();
            Alert::success('Berhasil', 'Merubah Data Diri');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Alert::error('failed', 'Ada Kesalahan Internal.');
            return redirect()->back();
        }
    }

    public function updateSchoolOrigin(Request $request)
    {
        DB::beginTransaction();
        try{
            $user = Auth::user();
            $student = StudentSchool::where('user_id', $user->id)
                ->first();

            $student->school_name = $request->user_school_name ?? $student->school_name;
            $student->school_phone = $request->user_school_phone ?? $student->school_phone;
            $student->school_address = $request->user_school_address ?? $student->school_address;
            $student->save();

            DB::commit();
            Alert::success('Berhasil', 'Merubah Data Asal Sekolah');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Alert::error('failed', 'Ada Kesalahan Internal.');
            return redirect()->back();
        }
    }

    public function pageParent()
    {
        $page = "parent";
        $student_father = StudentParent::where('user_id', Auth::user()->id)
            ->where('type_parent', 'Ayah')
            ->first();
            
        $student_mother = StudentParent::where('user_id', Auth::user()->id)
            ->where('type_parent', 'Ibu')
            ->first();
        return view('pages.parent_setting', compact(
            'student_father', 'student_mother', 'page'
        ));
    }

    public function storeStudentFather(Request $request)
    {
        $rules = [
            'f_parent_name' => 'required|string|max:191',
            'f_birth_place' => 'required|string|max:191',
            'f_birth_date' => 'required',
            'f_education' => 'required',
            'f_religion' => 'required',
            'f_profession' => 'required', 
            'f_income' => 'required',
            'f_whatsapp_phone' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.');
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $fatherData = [
                'parent_name' => $request->f_parent_name,
                'birth_place' => $request->f_birth_place,
                'birth_date' => $request->f_birth_date,
                'education' => $request->f_education,
                'religion' => $request->f_religion,
                'profession' => $request->f_profession,
                'income' => $request->f_income,
                'whatsapp_phone' => $request->f_whatsapp_phone,
            ];
    
            $check = StudentParent::where('user_id', $user_id)
                ->where('type_parent', 'Ayah')
                ->first();
    
            if ($check) {
                $check->update($fatherData);
            } else {
                $storeData = array_merge($fatherData, [
                    'user_id' => $user_id,
                    'type_parent' => 'Ayah',
                ]);
    
                StudentParent::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data ayah.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal');
        }

        return redirect()->back();
    }

    public function storeStudentMother(Request $request)
    {
        $rules = [
            'm_parent_name' => 'required|string|max:191',
            'm_birth_place' => 'required|string|max:191',
            'm_birth_date' => 'required',
            'm_education' => 'required',
            'm_religion' => 'required',
            'm_profession' => 'required', 
            'm_income' => 'required',
            'm_whatsapp_phone' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $fatherData = [
                'parent_name' => $request->m_parent_name,
                'birth_place' => $request->m_birth_place,
                'birth_date' => $request->m_birth_date,
                'education' => $request->m_education,
                'religion' => $request->m_religion,
                'profession' => $request->m_profession,
                'income' => $request->m_income,
                'whatsapp_phone' => $request->m_whatsapp_phone,
            ];
    
            $check = StudentParent::where('user_id', $user_id)
                ->where('type_parent', 'Ibu')
                ->first();
    
            if ($check) {
                $check->update($fatherData);
            } else {
                $storeData = array_merge($fatherData, [
                    'user_id' => $user_id,
                    'type_parent' => 'Ibu',
                ]);
                StudentParent::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data ibu.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.'. $e->getMessage());
        }

        return redirect()->back();
    }

    public function pagePresence()
    {
        $page = "presence";
        $student_seven = StudentPresence::where('user_id', Auth::user()->id)
            ->where('type_class', 'seven')
            ->first();
        $student_eight = StudentPresence::where('user_id', Auth::user()->id)
            ->where('type_class', 'eight')
            ->first();
        $student_nine = StudentPresence::where('user_id', Auth::user()->id)
            ->where('type_class', 'nine')
            ->first();
        return view('pages.presence_setting', compact(
            'page', 'student_seven', 'student_eight', 'student_nine'
        ));
    }

    public function storePresenceSeven(Request $request)
    {
        $rules = [
            's_sick_one' => 'required',
            's_permission_one' => 'required',
            's_alpa_one' => 'required',
            's_sick_two' => 'required',
            's_permission_two' => 'required',
            's_alpa_two' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $fatherData = [
                'sick_one' => $request->s_sick_one,
                'permission_one' => $request->s_permission_one,
                'alpa_one' => $request->s_alpa_one,
                'sick_two' => $request->s_sick_two,
                'permission_two' => $request->s_permission_two,
                'alpa_two' => $request->s_alpa_two,
            ];
    
            $check = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'seven')
                ->first();
    
            if ($check) {
                $check->update($fatherData);
            } else {
                $storeData = array_merge($fatherData, [
                    'user_id' => $user_id,
                    'type_class' => 'seven',
                ]);
                StudentPresence::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data absensi kelas 7.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.'. $e->getMessage());
        }

        return redirect()->back();
    }

    public function storePresenceEight(Request $request)
    {
        $rules = [
            'e_sick_one' => 'required',
            'e_permission_one' => 'required',
            'e_alpa_one' => 'required',
            'e_sick_two' => 'required',
            'e_permission_two' => 'required',
            'e_alpa_two' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $fatherData = [
                'sick_one' => $request->e_sick_one,
                'permission_one' => $request->e_permission_one,
                'alpa_one' => $request->e_alpa_one,
                'sick_two' => $request->e_sick_two,
                'permission_two' => $request->e_permission_two,
                'alpa_two' => $request->e_alpa_two,
            ];
    
            $check = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'eight')
                ->first();
    
            if ($check) {
                $check->update($fatherData);
            } else {
                $storeData = array_merge($fatherData, [
                    'user_id' => $user_id,
                    'type_class' => 'eight',
                ]);
                StudentPresence::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data absensi kelas 8.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.'. $e->getMessage());
        }

        return redirect()->back();
    }

    public function storePresenceNine(Request $request)
    {
        $rules = [
            'n_sick_one' => 'required',
            'n_permission_one' => 'required',
            'n_alpa_one' => 'required',
            'n_sick_two' => 'required',
            'n_permission_two' => 'required',
            'n_alpa_two' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $fatherData = [
                'sick_one' => $request->n_sick_one,
                'permission_one' => $request->n_permission_one,
                'alpa_one' => $request->n_alpa_one,
                'sick_two' => $request->n_sick_two,
                'permission_two' => $request->n_permission_two,
                'alpa_two' => $request->n_alpa_two,
            ];
    
            $check = StudentPresence::where('user_id', $user_id)
                ->where('type_class', 'nine')
                ->first();
    
            if ($check) {
                $check->update($fatherData);
            } else {
                $storeData = array_merge($fatherData, [
                    'user_id' => $user_id,
                    'type_class' => 'nine',
                ]);
                StudentPresence::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data absensi kelas 9.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.'. $e->getMessage());
        }

        return redirect()->back();
    }

    public function pageScore()
    {
        $page = "score";
        $student_seven = StudentScore::where('user_id', Auth::user()->id)
            ->where('type_class', 'seven')
            ->first();
        $student_eight = StudentScore::where('user_id', Auth::user()->id)
            ->where('type_class', 'eight')
            ->first();
        $student_nine = StudentScore::where('user_id', Auth::user()->id)
            ->where('type_class', 'nine')
            ->first();

        return view('pages.score_setting', compact(
            'page', 'student_seven', 'student_eight', 'student_nine'
        ));
    }

    public function createOrUpdateScore(Request $request){
        $rules = [
            'first_semester' => 'required',
            'second_semester' => 'required',
            'type_class' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
    
        DB::beginTransaction();
        try {
            $user_id = Auth::user()->id;
    
            $data_score = [
                'first_semester' => $request->first_semester,
                'second_semester' => $request->second_semester,
                'type_class' => $request->type_class,
            ];
    
            $check = StudentScore::where('user_id', $user_id)
                ->where('type_class', $request->type_class)
                ->first();
    
            if ($check) {
                $check->update($data_score);
            } else {
                $storeData = array_merge($data_score, [
                    'user_id' => $user_id,
                    'type_class' => $request->type_class,
                ]);
                StudentScore::create($storeData);
            }
    
            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data nilai.');
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Yah!', 'Maaf ada kesalahan internal.'. $e->getMessage());
        }

        return redirect()->back();
    }

    public function pageDocument()
    {
        $page = "document";

        return view('pages.document_setting', compact(
            'page',
        ));
    }

    public function createUpdateDocument(Request $request)
    {
        $rules = [
            'first_semester' => 'required',
            'second_semester' => 'required',
            'type_class' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            Alert::error('Yah', 'Mohon check kembali inputan kamu.'. $validator->errors());
            return redirect()->back()
                ->withInput()
                ->withErrors($validator->errors());
        }
        try{
            $request->validate([
                'sd_certificate' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Adjust the file types and size as needed
            ]);
        
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public');
            }
        }catch(\Exception $e){

        }
    }
}
