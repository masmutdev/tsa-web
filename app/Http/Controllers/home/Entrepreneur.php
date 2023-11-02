<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Entrepreneur extends Controller
{
  public function index()
  {
    return view('content.home.entrepreneur');
  }
}
