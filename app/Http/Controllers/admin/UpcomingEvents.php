<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ModelNewsManagement;
use App\Models\ModelUpcomingEvents;
use App\Http\Controllers\Controller;

class UpcomingEvents extends Controller
{
  /**
   * Redirect to user-management view.
   *
   */
  public function UpcomingEvents()
  {
    return view('content.admin.upcoming-events');
  }

  public function EditUpcomingEvents($id)
  {
      $upcoming = ModelUpcomingEvents::find($id);
      if (!$upcoming) {
        return view('content.pages.pages-misc-error');
      }

      return view('content.admin.edit-upcoming-events', ['upcoming' => $upcoming]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'image',
      3 => 'title',
      4 => 'content',
      5 => 'status',
      6 => 'start_date',
      7 => 'end_date',
      8 => 'created_at',
      9 => 'updated_at',
    ];

    $search = [];

    $totalData = ModelUpcomingEvents::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $upcoming = ModelUpcomingEvents::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $upcoming = ModelUpcomingEvents::where('id', 'LIKE', "%{$search}%")
        ->orWhere('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = ModelUpcomingEvents::where('id', 'LIKE', "%{$search}%")
        ->orWhere('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($upcoming)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($upcoming as $berita) {
        $nestedData['id'] = $berita->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['image'] = $berita->image;
        $nestedData['title'] = $berita->title;
        $nestedData['content'] = $berita->content;
        $nestedData['status'] = $berita->status;
        $nestedData['start_date'] = $berita->start_date;
        $nestedData['end_date'] = $berita->end_date;
        $nestedData['created_at'] = $berita->created_at;
        $nestedData['updated_at'] = $berita->updated_at;
        $data[] = $nestedData;
      }
    }

    if ($data) {
      return response()->json([
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval($totalData),
        'recordsFiltered' => intval($totalFiltered),
        'code' => 200,
        'data' => $data,
      ]);
    } else {
      return response()->json([
        'message' => 'Internal Server Error',
        'code' => 500,
        'data' => [],
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $beritaID = $request->id;

      if ($beritaID) {
        // Periksa apakah ID valid
        $upcoming = ModelUpcomingEvents::find($beritaID);

        if (!$upcoming) {
            // Handle jika ID tidak valid, misalnya dengan redirect atau pesan kesalahan
            return redirect()->route('upcoming-events')->with('error', 'Upcoming Events Not Found');
        }

        // Update data berita
        $upcoming->title = $request->title;
        $upcoming->content = $request->content;
        $upcoming->status = $request->status;
        $upcoming->start_date = $request->start_date;
        $upcoming->end_date = $request->end_date;


        // Upload dan simpan nama file gambar jika ada unggahan gambar baru
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName(); // Mendapatkan nama asli file
            $request->file('image')->storeAs('public/upcoming', $imageName); // Simpan gambar dengan nama asli di folder public/upcoming
            $upcoming->image = 'upcoming/' . $imageName; // Simpan nama file ke dalam kolom 'image'
        }

        $upcoming->save();

        // Berhasil diupdate
        return redirect()->route('upcoming-events')->with('success', 'Upcoming Events Successfully Updated');
      } else {
          // Upload dan simpan nama file gambar
          if ($request->hasFile('image')) {
              $imageName = $request->file('image')->getClientOriginalName(); // Mendapatkan nama asli file
              $request->file('image')->storeAs('public/upcoming', $imageName); // Simpan gambar dengan nama asli di folder public/upcoming
          }
          // Buat data berita baru
          $upcoming = ModelUpcomingEvents::create([
              'title' => $request->title,
              'content' => $request->content,
              'start_date' => $request->start_date,
              'end_date' => $request->end_date,
              'status' => $request->status,
              'image' => $imageName, // Simpan nama file ke dalam kolom 'image'
          ]);

          // Berhasil dibuat
          return redirect()->route('upcoming-events')->with('success', 'Upcoming Events Successfully Added');
      }
  }



  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $where = ['id' => $id];

    $upcoming = ModelUpcomingEvents::where($where)->first();

    return response()->json($upcoming);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $upcoming = ModelUpcomingEvents::where('id', $id)->delete();
  }
}
