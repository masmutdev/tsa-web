<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Leadership extends Controller
{
  public function index()
  {
    return view('content.home.leadership');
  }
}
