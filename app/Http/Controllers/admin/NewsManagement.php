<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ModelNewsManagement;
use App\Http\Controllers\Controller;

class NewsManagement extends Controller
{
  /**
   * Redirect to user-management view.
   *
   */
  public function NewsManagement()
  {
    return view('content.admin.news-management');
  }

  public function EditNewsManagement($id)
  {
      $news = ModelNewsManagement::find($id);
      if (!$news) {
        return view('content.pages.pages-misc-error');
      }

      return view('content.admin.edit-news-management', ['news' => $news]);
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
      6 => 'created_at',
      7 => 'updated_at',
    ];

    $search = [];

    $totalData = ModelNewsManagement::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $news = ModelNewsManagement::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $news = ModelNewsManagement::where('id', 'LIKE', "%{$search}%")
        ->orWhere('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = ModelNewsManagement::where('id', 'LIKE', "%{$search}%")
        ->orWhere('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($news)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($news as $berita) {
        $nestedData['id'] = $berita->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['image'] = $berita->image;
        $nestedData['title'] = $berita->title;
        $nestedData['content'] = $berita->content;
        $nestedData['status'] = $berita->status;
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
        $news = ModelNewsManagement::find($beritaID);

        if (!$news) {
            // Handle jika ID tidak valid, misalnya dengan redirect atau pesan kesalahan
            return redirect()->route('news-management')->with('error', 'News Not Found');
        }

        // Update data berita
        $news->title = $request->title;
        $news->content = $request->content;
        $news->status = $request->status;

        // Upload dan simpan nama file gambar jika ada unggahan gambar baru
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName(); // Mendapatkan nama asli file
            $request->file('image')->storeAs('public/news_images', $imageName); // Simpan gambar dengan nama asli di folder public/news_images
            $news->image = 'news_images/' . $imageName; // Simpan nama file ke dalam kolom 'image'
        }

        $news->save();

        // Berhasil diupdate
        return redirect()->route('news-management')->with('success', 'News Successfully Updated');
      } else {
          // Upload dan simpan nama file gambar
          if ($request->hasFile('image')) {
              $imageName = $request->file('image')->getClientOriginalName(); // Mendapatkan nama asli file
              $request->file('image')->storeAs('public/news_images', $imageName); // Simpan gambar dengan nama asli di folder public/news_images
          }
          // Buat data berita baru
          $news = ModelNewsManagement::create([
              'title' => $request->title,
              'content' => $request->content,
              'status' => $request->status,
              'image' => $imageName, // Simpan nama file ke dalam kolom 'image'
          ]);

          // Berhasil dibuat
          return redirect()->route('news-management')->with('success', 'News Successfully Added');
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

    $news = ModelNewsManagement::where($where)->first();

    return response()->json($news);
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
    $news = ModelNewsManagement::where('id', $id)->delete();
  }
}
