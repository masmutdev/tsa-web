<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FinanceSpend;
use Illuminate\Http\Request;

class Spend extends Controller
{
  public function index()
  {
    return view('content.admin.spend');
  }

  public function simpan_spend(Request $request)
  {
    // Validasi data yang diterima dari form
    $request->validate([
        'needs' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    // Simpan data ke dalam model FinanceIncome
    $income = new FinanceSpend();
    $income->needs = $request->input('needs');
    $income->price = $request->input('price');
    $income->description = $request->input('description');
    $income->save();

    // Jika Anda ingin mengembalikan response atau melakukan redirect, Anda bisa melakukannya di sini
    // Contoh:
    return redirect('/spend')->with('success', 'Data pengeluaran berhasil disimpan');
  }
}
