<?php

namespace App\Http\Controllers\admin;

use App\Models\ModelMemo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Memo extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $memos = ModelMemo::where('user_id', $user->user_id)->get();
      return view('content.admin.memo', ['memos' => $memos]);
  }
  public function simpan_memo(Request $request)
  {
      $user = Auth::user();
      ModelMemo::create([
          'user_id' => $user->user_id,
          'title' => $request->input('title'),
          'content' => $request->input('content'),
          'visibility' => $request->input('visibility'),
      ]);

      return redirect('/memo')->with('success', 'Memo berhasil disimpan.');
  }

  public function bersihkan_memo(Request $request)
  {
      $user = Auth::user();

      // Menghapus semua memo yang dimiliki oleh user
      ModelMemo::where('user_id', $user->user_id)->delete();

      return redirect('/memo')->with('success', 'Semua memo berhasil dihapus.');
  }

}
