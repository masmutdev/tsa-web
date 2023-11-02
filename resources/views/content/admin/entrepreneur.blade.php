@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - eCommerce')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/entrepreneur-main.js')}}"></script>
@endsection

@section('content')
<div class="row">

  <!-- Statistics cards & Revenue Growth Chart -->
  <div class="col-lg-12 col-12">
    <div class="row d-flex justify-content-between">
      <!-- Statistics Cards -->
      <div class="col-6 col-md-3 col-lg-6 col-xl-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center">
            <div class="avatar mx-auto mb-2">
              <span class="avatar-initial rounded-circle bg-label-primary"><i class="bx bx-credit-card fs-4"></i></span>
            </div>
            <span class="d-block text-nowrap">Pengeluaran</span>
            <h2 class="mb-0">{{ $incomeCount }}</h2>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-6 col-xl-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center">
            <div class="avatar mx-auto mb-2">
              <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-credit-card fs-4"></i></span>
            </div>
            <span class="d-block text-nowrap">Pemasukan</span>
            <h2 class="mb-0">{{ $spendCount }}</h2>
          </div>
        </div>
      </div>
      <!--/ Statistics Cards -->
    </div>
  </div>
  <!--/ Statistics cards & Revenue Growth Chart -->

  <div class="col-12 mb-4">
    <div class="card">
      <div class="row row-bordered m-0">
        <!-- Order Summary -->
        <div class="col-12 px-0">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Penghasilan</h5>
          </div>
          <div class="card-body p-0">
            <div id="orderSummaryChart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <h5>History Pemasukan Dan Pengeluaran</h5>
    <div class="card-datatable text-nowrap">
      <table class="entrepreneur table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>No.</th>
            <th>Keperluan Masuk</th>
            <th>Harga Masuk</th>
            <th>Keperluan Keluar</th>
            <th>Harga Keluar</th>
            <th>Keterangan</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

</div>

@endsection
