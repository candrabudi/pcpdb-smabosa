<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Auth;
use Alert;
use DB;

class DocumentController extends Controller
{
    public function createUpdateDocument(Request $request)
    {
        try {
            $user = Auth::user();
            $user_name = str_replace(' ', '_', strtolower($user->full_name));

            $documentFields = ['sd_certificate', 'rapor_smp', 'smp_certificate','birth_certificate', 'family_card', 'pas_photo', 'signature'];
            $documentPaths = [];

            foreach ($documentFields as $field) {
                if ($request->hasFile($field)) {
                    $uploadedFile = $request->file($field);
                    $customFileName = $user_name.'_'. $field . '.' . $uploadedFile->getClientOriginalExtension();
                    $documentPaths[$field] = $uploadedFile->storeAs($field, $customFileName, 'public');
                }
            }

            $check = StudentDocument::where('user_id', $user->id)->first();

            if ($check) {
                foreach ($documentFields as $field) {
                    if (isset($documentPaths[$field])) {
                        $check->{$field} = $documentPaths[$field] ?? $check->{$field};
                    }
                }
                $check->save();
            } else {
                $document = new StudentDocument([
                    'user_id' => $user->id,
                    'sd_certificate' => $documentPaths['sd_certificate'] ?? '',
                    'rapor_smp' => $documentPaths['rapor_smp'] ?? '',
                    'smp_certificate' => $documentPaths['smp_certificate'] ?? '',
                    'birth_certificate' => $documentPaths['birth_certificate'] ?? '',
                    'family_card' => $documentPaths['family_card'] ?? '',
                    'pas_photo' => $documentPaths['pas_photo'] ?? '',
                    'signature' => $documentPaths['signature'] ?? '',
                ]);
                $document->save();
            }

            DB::commit();
            Alert::success('Yay!', 'Berhasil Merubah data Dokumen.');

            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
