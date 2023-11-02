<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\ModelNewsManagement;
use App\Http\Controllers\Controller;

class IsiBerita extends Controller
{
  public function index($id)
  {
      $Berita = ModelNewsManagement::find($id);
      $allBerita = ModelNewsManagement::all();

      if (!$Berita) {
          // Handle jika Berita tidak ditemukan, misalnya tampilkan pesan kesalahan.
          return abort(404);
      }

      return view('content.home.isi-berita', compact('Berita', 'allBerita'));
  }
}
