<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentSchool;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\Broadcast;
use App\Models\SchoolYear;
use App\Models\StudentDetail;
use App\Models\StudentDocument;
use App\Models\StudentParent;
use App\Models\StudentPresence;
use App\Models\StudentScore;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Validator;
use PDF;

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
        if($user->role_name != "Student"){
            return redirect()->route('admin.dashboard');
        }
        $broadcast = Broadcast::all()
            ->toArray();
        $i = 0;
        $data_broadcast = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'],
                'notes' => $new['notes'],
                'file' => asset('storage/broadcast/'.$new['file_path']),
                'is_file' => !empty($new['file_path']) ? true : false
            ]; 
        }, $broadcast);
        return view('pages.student.dashboard', compact(
            'user',
            'data_broadcast'
        ));
    }

    private function checkDataStudent()
    {
        $user = Auth::user();
        $student = Student::select('id')
            ->where('user_id', $user->id)
            ->first();
        $student_school = StudentSchool::select('id')
            ->where('user_id', $user->id)
            ->whereNotNull(['school_name', 'school_address', 'school_phone'])
            ->first();
        $student_parents = StudentParent::select('id')
            ->where('user_id', $user->id)
            ->get();
        $student_father = StudentParent::where('user_id', $user->id)
            ->where('type_parent', 'Ayah')
            ->first();
        $student_mother = StudentParent::where('user_id', $user->id)
            ->where('type_parent', 'Ibu')
            ->first();
        $student_scores = StudentScore::where('user_id', $user->id)
            ->get();
        $student_presences = StudentPresence::where('user_id', $user->id)
            ->get();
        $student_document = StudentDocument::where('user_id', $user->id)
            ->first();
        $student_detail = StudentDetail::select('id')
            ->where('user_id', $user->id)
            ->first();

        $data_validation = array(
            'student' => $student ? true : false,
            'student_school' => $student_school ? true : false,
            'student_father' => $student_father ? true : false,
            'student_mother' => $student_mother ? true : false,
            'student_parents' => count($student_parents) == 2 ? true : false,
            'student_scores' => count($student_scores) == 3 ? true : false, 
            'student_presences' => count($student_presences) ==  3 ? true : false,
            'student_document' => $student_document ?  true : false,
            'student_detail' => $student_detail ?  true : false,
        );

        return $data_validation;
    }

    public function studentPrintPdf()
    {
        $data_validation = $this->checkDataStudent();

        // if(!$data_validation['student'] || !$data_validation['student_school']
        // || !$data_validation['student_parents'] || !$data_validation['student_father']
        // || !$data_validation['student_mother'] || !$data_validation['student_presences']
        // || !$data_validation['student_scores'] || !$data_validation['student_document']
        // || !$data_validation['student_detail']){
        //     Alert::error('Yah!', 'Maaf gagal download, silahkan lengkapi data diri kamu.');
        //     return redirect()->route('dashboard');
        // }
        $user = Auth::user();
        $siswa = Student::where('user_id', $user->id)->first();
        $data = array(
            'nama_siswa' => $user->full_name,
            'email_siswa' => $user->email,
            'siswa' => $siswa,
            'sekolah' => StudentSchool::where('user_id', $user->id)->first(),
            'nilai_kelas_tujuh' => StudentScore::where('user_id', $user->id)->where('type_class', 'seven')->first(),
            'nilai_kelas_delapan' => StudentScore::where('user_id', $user->id)->where('type_class', 'eight')->first(),
            'nilai_kelas_sembilan' => StudentScore::where('user_id', $user->id)->where('type_class', 'nine')->first(),
            'absen_tujuh' => StudentPresence::where('user_id', $user->id)->where('type_class', 'seven')->first(),
            'absen_delapan' => StudentPresence::where('user_id', $user->id)->where('type_class', 'eight')->first(),
            'absen_sembilan' => StudentPresence::where('user_id', $user->id)->where('type_class', 'nine')->first(),
            'ayah' => StudentParent::where('user_id', $user->id)->where('type_parent', 'Ayah')->first(),
            'ibu' => StudentParent::where('user_id', $user->id)->where('type_parent', 'Ibu')->first(),
            'wali' => StudentParent::where('user_id', $user->id)->where('type_parent', 'Wali')->first(),
            'siswa_detail' => StudentDetail::where('user_id', $user->id)->first(),
            'siswa_dokumen' => StudentDocument::where('user_id', $user->id)->first(),
            'tahun_sekolah' => SchoolYear::where('id', $siswa->school_year_id)->first(),
        );
        $pdf = PDF::loadView('pdf.formulir', $data);
        // return $pdf->stream('preview.pdf');
        return $pdf->download(str_replace(' ', '_', strtolower($user->full_name)).'.pdf');
    }
}
