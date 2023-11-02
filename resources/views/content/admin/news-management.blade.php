@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'DataTables - Advanced Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
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
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/news-management.js')}}"></script>
<script src="{{asset('js/editor-content.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"> News Management</h4>

<!-- Ajax Sourced Server-side -->
<div class="col-12">
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
<div class="card">
  <div class="d-flex flex-row justify-content-end mt-2">
    <button class="tambah-data btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalTambahData"><i class="bx bx-plus me-2"></i>Add News</button>
  </div>
  <div class="card-datatable text-nowrap">
    <table class="news-management table table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>No.</th>
          <th>Image</th>
          <th>Title</th>
          <th>Content</th>
          <th>Status</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Modal Tambah Data -->
  <div class="modal fade" id="modalTambahData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditTitle">Add News</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/data-news" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="d-flex justify-content-center mb-3">
                  <img class="rounded" id="uploadedImage" src="{{asset('assets/img/noimage-lebar.webp')}}" alt="Image" style="width: 47vw">
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <input type="hidden" name="content" id="content">
                <div class="mb-3">
                  <label class="image" for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="imageInput" required/>
                </div>
                <div class="mb-3">
                  <label class="title" for="title">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title" aria-label="title" required/>
                </div>
                <div class="mb-3">
                  <label class="content" for="content">Content</label>
                  <div id="snow-toolbar">
                    <span class="ql-formats">
                      <select class="ql-font"></select>
                      <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-bold"></button>
                      <button class="ql-italic"></button>
                      <button class="ql-underline"></button>
                      <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                      <select class="ql-color"></select>
                      <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-script" value="sub"></button>
                      <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                      <button class="ql-header" value="1"></button>
                      <button class="ql-header" value="2"></button>
                      <button class="ql-blockquote"></button>
                      <button class="ql-code-block"></button>
                    </span>
                  </div>
                  <div id="snow-editor">
                    <p> Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love. </p>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="status" for="status" required>Status</label>
                  <select class="form-select" name="status">
                    <option value="">Select One</option>
                    <option value="Aktif" selected>Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Ajax Sourced Server-side -->

@endsection
