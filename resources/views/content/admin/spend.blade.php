@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - eCommerce')

@section('content')
<div class="row">
  @if(session('success'))
<div class="alert alert-success alert-dismissible d-flex align-items-center mb-4 mt-4" role="alert">
    <i class="bx bx-xs bx-check me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible d-flex align-items-center mb-4 mt-4" role="alert">
    <i class="bx bx-xs bx-x me-2"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif
</div>

<div class="row">

  <div class="card">
    <h5 class="card-header">Masukkan Data Pengeluaran</h5>
    <div class="card-body">
      <form action="/simpan-finance" method="POST">
      @csrf
      <div class="mb-3">
        <label for="needs_spend">Keperluan</label>
        <input class="form-control" type="text" name="needs_spend" placeholder="Makanan" id="needs_spend" required>
      </div>
      <div class="mb-3">
        <label for="price_spend">Harga</label>
        <input class="form-control" type="number" name="price_spend" id="price_spend" required>
      </div>
      <div class="mb-3">
        <label for="description">Keterangan</label>
        <select class="form-control" name="description" id="description" required>
          <option value="">Pilih Salah Satu</option>
          <option value="Pemasukan">Pemasukan</option>
          <option value="Pengeluaran">Pengeluaran</option>
        </select>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-start">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>

</div>

@endsection
