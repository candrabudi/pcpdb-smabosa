<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentDocument;
use App\Models\StudentParent;
use App\Models\StudentPresence;
use App\Models\StudentSchool;
use App\Models\StudentScore;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function datatable()
    {
        $students = User::where('role_name', 'Student')
            ->join('students as s','s.user_id', '=', 'users.id')
            ->select('users.email as email', 'users.full_name', 's.*')
            ->get()
            ->toArray();
            $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['user_id'],
                'nisn' => $new['nisn'],
                'email' => $new['email'],
                'full_name' => $new['full_name'],
                'nisn' => $new['nisn'],
                'registration_number' => $new['registration_number'],
                'whatsapp_phone' => $new['whatsapp_phone'],
            ]; 
        }, $students);
        
        return DataTables::of($reform)->make(true);

    }

    public function detailStudent($id)
    {
        $auth = auth()->user();
        $user = User::where('id', $id)->first();
        $student = Student::where('user_id', $user->id)
            ->first();
        $student_school = StudentSchool::where('user_id', $user->id)
            ->first();
        $student_parents = StudentParent::where('user_id', $user->id)
            ->get();
        $student_scores = StudentScore::where('user_id', $user->id)
            ->get();
        $student_presences = StudentPresence::where('user_id', $user->id)
            ->get();
        $student_document = StudentDocument::where('user_id', $user->id)
            ->first();
        return view('pages.admin.student.index', compact(
            'auth',
            'user',
            'student',
            'student_parents',
            'student_scores',
            'student_school',
            'student_presences',
            'student_document'
        ));
    }
}
