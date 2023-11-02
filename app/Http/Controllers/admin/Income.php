<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\FinanceIncome;
use App\Http\Controllers\Controller;

class Income extends Controller
{
  public function index()
  {
    return view('content.admin.income');
  }

  public function simpan_income(Request $request)
  {
    // Validasi data yang diterima dari form
    $request->validate([
        'needs' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);

    // Simpan data ke dalam model FinanceIncome
    $income = new FinanceIncome();
    $income->needs = $request->input('needs');
    $income->price = $request->input('price');
    $income->description = $request->input('description');
    $income->save();

    // Jika Anda ingin mengembalikan response atau melakukan redirect, Anda bisa melakukannya di sini
    // Contoh:
    return redirect('/income')->with('success', 'Data pemasukan berhasil disimpan');
  }

}
