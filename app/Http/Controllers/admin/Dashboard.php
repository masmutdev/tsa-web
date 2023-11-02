<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ModelEventCalendar;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
  public function index()
  {
      $activeUsers = User::activeUsers();
      $totalUsers = User::count();
      $events = ModelEventCalendar::all();

      return view('content.admin.dashboard', compact('activeUsers','totalUsers', 'events'));
  }
}
