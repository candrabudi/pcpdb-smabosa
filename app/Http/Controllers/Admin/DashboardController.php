<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use App\Models\Student;
use App\Models\StudentDocument;
use App\Models\StudentParent;
use App\Models\StudentPresence;
use App\Models\StudentSchool;
use App\Models\StudentScore;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use Validator;
use Storage;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::user()){
            return redirect()->route('admin.login');
        }
        $student_man = Student::where('gender', 'Laki-laki')
            ->select('id')->count();
        $student_woman = Student::where('gender', 'Perempuan')
            ->select('id')->count();
        return view('pages.admin.index', compact(
            'student_woman',
            'student_man',
        ));
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
                'status' => $new['status'],
            ]; 
        }, $students);
        
        return DataTables::of($reform)->make(true);

    }

    public function detailStudent($id)
    {
        if(!Auth::user()){
            return redirect()->route('admin.login');
        }
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

    public function editStudent($id)
    {
        if(!Auth::user()){
            return redirect()->route('admin.login');
        }
        $auth = auth()->user();
        $user = User::where('id', $id)->first();
        $student = Student::where('user_id', $user->id)
            ->first();
        return view('pages.admin.student.edit', compact(
            'student'
        ));
    }

    public function updateStudent(Request $request, $id)
    {
        if(!Auth::user()){
            return redirect()->route('admin.login');
        }
        $auth = auth()->user();
        $student = Student::where('id', $id)
            ->first();
        if(!$student){
            return redirect()->back();
        }
        $user_student = User::where('id', $student->user_id)
            ->first();
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $customFileName = $user_student->full_name.'_status_'.$request->status.'.' .$uploadedFile->getClientOriginalExtension();
            $documentPaths = $uploadedFile->storeAs('file_status', $customFileName, 'public');

            Student::where('id', $id)
                ->update([
                    'file_path' => $documentPaths,
                    'status' => $request->status
                ]);
        }else{
            return redirect()->back();
        }
        return view('pages.admin.student.edit', compact(
            'student'
        ));
    }

    public function listBroadcast(){
        return view('pages.admin.broadcast.index');
    }
    public function createBroadcast(){
        return view('pages.admin.broadcast.create');
    }
    
    public function editBroadcast($id){
        $broadcast = Broadcast::where('id', $id)
            ->first();
        return view('pages.admin.broadcast.edit', compact(
            'broadcast'
        ));
    }

    public function datatableBroadcast()
    {
        $broadcast = Broadcast::all()
            ->toArray();
        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
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
        
        return DataTables::of($reform)->make(true);
    }

    public function storeBroadcast(Request $request)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'title' => 'required|string|max:191',
                'notes' => 'required|string|max:191',
                'file' => 'max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Tolong Masukan Judul Broadcast.',
                'notes.required' => 'Tolong Masukan Judul Broadcast.',
                'file.max' => 'Maaf file terlalu besar.',
            ];
            
    
            $validator = Validator::make($request->all(), $rules, $customMessages);
    
            if ($validator->fails()) {
                return redirect()
                    ->route('admin.broadcast')
                    ->withInput()
                    ->withErrors($validator->errors());
            }
            $title = str_replace(' ', '_', strtolower($request->title));
            if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $customFileName = $title.'.'. $uploadedFile->getClientOriginalExtension();
                $uploadedFile->storeAs('broadcast', $customFileName, 'public');
            }else{
                $customFileName = null;
            }
    
            $broadcast = new Broadcast();
            $broadcast->title = $request->title;
            $broadcast->notes = $request->notes;
            $broadcast->file_path = $customFileName;
            $broadcast->save();
            
            DB::commit();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('success', 'Berhasil Mengirim Broadcast');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('error', 'Maaf ada kesalahan internal.');
        }
    }

    public function updateBroadcast(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $rules = [
                'title' => 'required|string|max:191',
                'notes' => 'required|string|max:191',
                'file' => 'max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Tolong Masukan Judul Broadcast.',
                'notes.required' => 'Tolong Masukan Judul Broadcast.',
                'file.max' => 'Maaf file terlalu besar.',
            ];
            
    
            $validator = Validator::make($request->all(), $rules, $customMessages);
    
            if ($validator->fails()) {
                return redirect()
                    ->route('admin.broadcast')
                    ->withInput()
                    ->withErrors($validator->errors());
            }
            $title = str_replace(' ', '_', strtolower($request->title));
            $broadcast = Broadcast::where('id', $id)->first();
            if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $customFileName = $title.'.'. $uploadedFile->getClientOriginalExtension();
                $uploadedFile->storeAs('broadcast', $customFileName, 'public');
            }else{
                $customFileName = $broadcast->file_path;
            }
    
            
            $broadcast->title = $request->title;
            $broadcast->notes = $request->notes;
            $broadcast->file_path = $customFileName;
            $broadcast->save();
            
            DB::commit();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('success', 'Berhasil Mengupdate Broadcast');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('error', 'Maaf ada kesalahan internal.');
        }
    }

    public function deleteBroadcast($id)
    {
        DB::beginTransaction();
        try{
          
            Broadcast::where('id', $id)->delete();
            
            DB::commit();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('success', 'Berhasil Menghapus Broadcast');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()
                ->route('admin.broadcast')
                ->withInput()
                ->with('error', 'Maaf ada kesalahan internal.');
        }
    }
}
