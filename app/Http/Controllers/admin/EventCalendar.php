<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ModelEventCalendar;
use Illuminate\Http\Request;

class EventCalendar extends Controller
{
  public function index()
  {
    $events = ModelEventCalendar::all();
    return view('content.admin.event-calendar', compact('events'));
  }

  public function simpan_event(Request $request)
  {
      // Validasi data inputan jika diperlukan
      $validatedData = $request->validate([
          'event_name' => 'required|string|max:255',
          'start_date' => 'required|date',
          'end_date' => 'required|date',
      ]);

      // Simpan data ke database atau lakukan operasi yang diperlukan
      // Contoh: Simpan ke database
      $event = new ModelEventCalendar;
      $event->event_name = $validatedData['event_name'];
      $event->start_date = $validatedData['start_date'];
      $event->end_date = $validatedData['end_date'];
      $event->save();

      // Redirect atau berikan respons sesuai kebutuhan
      return redirect('/event-calendar')->with('success', 'Event telah berhasil ditambahkan');
  }
}
