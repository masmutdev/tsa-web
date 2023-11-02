<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\ModelFilesManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FilesManager extends Controller
{
  public function index()
  {
    // Mengambil data file berdasarkan user_id dari user yang saat ini masuk
    $user = Auth::user();
    $userFiles = ModelFilesManager::where('user_id', $user->user_id)->get();
    return view('content.admin.files-manager',  compact('userFiles'));
  }

  public function upload_file(Request $request)
  {
      $request->validate([
          'file_data' => 'required|file',
          'file_description' => 'required',
      ]);

      $visibility = $request->input('visibility') == 'Shared' ? 'Shared' : 'Member';

      $file = $request->file('file_data');
      $fileDescription = $request->input('file_description');

      $user = Auth::user();

      // Dapatkan nama file asli beserta ekstensinya
      $originalFileName = $file->getClientOriginalName();

      // Dapatkan format ekstensi dari file
      $fileExtension = $file->getClientOriginalExtension();

      $uploadedFileName = $user->user_id . '_' . $originalFileName;

      $file->storeAs('public/files_manager', $uploadedFileName);

      ModelFilesManager::create([
          'user_id' => $user->user_id,
          'file_name' => $uploadedFileName,
          'file_description' => $fileDescription,
          'file_data' => $uploadedFileName,
          'visibility' => $visibility,
          'format' => $fileExtension, // Menyimpan ekstensi file dalam kolom 'format'
      ]);

      return redirect('/files-manager')->with('success', 'File berhasil diunggah.');
  }

  public function bersihkan_files(Request $request)
  {
      $user = Auth::user();

      // Menghapus semua memo yang dimiliki oleh user
      ModelFilesManager::where('user_id', $user->user_id)->delete();

      return redirect('/files-manager')->with('success', 'Semua files berhasil dihapus.');
  }


}
