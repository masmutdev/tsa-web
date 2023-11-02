<?php

namespace App\Http\Controllers\admin;

use App\Models\FinanceSpend;
use App\Models\ModelFinance;
use Illuminate\Http\Request;
use App\Models\FinanceIncome;
use App\Http\Controllers\Controller;

class Entrepreneur extends Controller
{
  public function Entrepreneur()
  {
      $incomeCount = ModelFinance::where('description', 'Pemasukan')->count();
      $spendCount = ModelFinance::where('description', 'Pengeluaran')->count();
      return view('content.admin.entrepreneur', compact('incomeCount','spendCount'));
  }

  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'needs_income',
      3 => 'needs_spend',
      4 => 'price_income',
      5 => 'price_spend',
      6 => 'description',
    ];

    $search = [];

    $totalData = ModelFinance::count();

    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $news = ModelFinance::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $news = ModelFinance::where('id', 'LIKE', "%{$search}%")
        ->orWhere('needs_income', 'LIKE', "%{$search}%")
        ->orWhere('needs_spend', 'LIKE', "%{$search}%")
        ->orWhere('price_income', 'LIKE', "%{$search}%")
        ->orWhere('price_spend', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = ModelFinance::where('id', 'LIKE', "%{$search}%")
        ->orWhere('needs_income', 'LIKE', "%{$search}%")
        ->orWhere('needs_spend', 'LIKE', "%{$search}%")
        ->orWhere('price_income', 'LIKE', "%{$search}%")
        ->orWhere('price_spend', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($news)) {
      // providing a dummy id instead of database ids
      $ids = $start;

      foreach ($news as $berita) {
        $nestedData['id'] = $berita->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['needs_income'] = $berita->needs_income;
        $nestedData['needs_spend'] = $berita->needs_spend;
        $nestedData['price_income'] = $berita-> price_income;
        $nestedData['price_spend'] = $berita->price_spend;
        $nestedData['description'] = $berita->description;
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

  public function simpan_finance(Request $request)
  {
      ModelFinance::create([
          'needs_income' => $request->input('needs_income'),
          'price_income' => $request->input('price_income'),
          'needs_spend' => $request->input('needs_spend'),
          'price_spend' => $request->input('price_spend'),
          'description' => $request->input('description'),
      ]);

      return redirect('/income')->with('success', 'Data berhasil disimpan.');
  }

  public function destroy($id)
  {
    $news = ModelFinance::where('id', $id)->delete();
  }

}
