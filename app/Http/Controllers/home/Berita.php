<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\ModelNewsManagement;
use Illuminate\Http\Request;

class Berita extends Controller
{
  public function index ()
  {
    $Berita = ModelNewsManagement::all();
    return view ('content.home.berita', compact('Berita'));
  }
}
