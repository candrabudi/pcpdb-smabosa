<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentDetail;
use App\Models\StudentParent;
use App\Models\StudentPresence;
use App\Models\StudentSchool;
use App\Models\StudentScore;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function pagePersonalData()
    {
        $page = "account";
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)
            ->first();
        $student_detail = StudentDetail::where('user_id', $user->id)
            ->first();
        $student_school = StudentSchool::where('user_id', $user->id)
            ->first();
        return view('pages.student.settings.account_setting', compact(
            'user',
            'student',
            'student_school',
            'page',
            'student_detail'
        ));
    }

    public function pagePresenceData()
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
        return view('pages.student.settings.presence_setting', compact(
            'page',
            'student_seven',
            'student_eight',
            'student_nine'
        ));
    }

    public function pageParent()
    {
        $page = "parent";
        $user_id = Auth::user()->id;

        $student_father = StudentParent::firstOrNew([
            'user_id' => $user_id,
            'type_parent' => 'Ayah'
        ]);

        $student_mother = StudentParent::firstOrNew([
            'user_id' => $user_id,
            'type_parent' => 'Ibu'
        ]);

        return view('pages.student.settings.parent_setting', compact(
            'student_father',
            'student_mother',
            'page'
        ));
    }

    public function pageScore()
    {
        $page = "score";

        $classMappings = [
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        ];

        $fetch = StudentScore::where('user_id', Auth::user()->id)
            ->whereIn('type_class', array_keys($classMappings))
            ->get();

        $student_scores = [];

        foreach ($fetch as $ss) {
            $type_class = $classMappings[$ss->type_class];

            $student_scores[$type_class] = [
                'first_semester' => $ss->first_semester,
                'second_semester' => $ss->second_semester,
            ];
        }

        return view('pages.student.settings.score_setting', compact(
            'page',
            'student_scores',
        ));
    }

    public function pageDocument()
    {
        $page = "document";

        return view('pages.student.settings.document_setting', compact(
            'page',
        ));
    }
}
