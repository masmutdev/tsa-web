<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\ModelNewsManagement;
use App\Http\Controllers\Controller;
use App\Models\ModelUpcomingEvents;

class Home extends Controller
{
  public function index()
  {
    $Berita = ModelNewsManagement::all();
    $Upcoming = ModelUpcomingEvents::all();

    return view('content.home.home', compact('Berita','Upcoming'));
  }
}
