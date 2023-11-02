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
@endsection

@section('page-script')
<script src="{{asset('js/users-management.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"> Users Management</h4>

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
    <button class="tambah-data btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalTambahData"><i class="bx bx-plus me-2"></i>Add User</button>
    <button class="btn btn-secondary me-2"><i class="bx bx-printer me-2"></i>Export Users</button>
  </div>
  <div class="card-datatable text-nowrap">
    <table class="users-management table table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>No.</th>
          <th>Name</th>
          <th>User ID</th>
          <th>Email</th>
          <th>Status</th>
          <th>Level</th>
          <th>Role</th>
          <th>Joined At</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- Modal Tambah Data -->
  <div class="modal fade" id="modalTambahData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditTitle">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/data-users" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="mb-3">
                <label class="user_id" for="user_id">User ID</label>
                <input type="text" class="form-control" placeholder="USER ID" name="user_id" aria-label="USER ID" required/>
              </div>
              <div class="mb-3">
                <label class="name" for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" aria-label="Name" required/>
              </div>
              <div class="mb-3">
                <label class="email" for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Masukkan Email" required/>
              </div>
              <div class="mb-3">
                <label class="password" for="password">Password</label>
                <input type="text" class="form-control" placeholder="Password" name="password" aria-describedby="password" required/>
              </div>
              <div class="mb-3">
                <label class="level" for="level" required>Level</label>
                <select class="form-select" name="level">
                  <option value="">Select One</option>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="status" for="status" required>Status</label>
                <select class="form-select" name="status">
                  <option value="">Select One</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="role" for="role" required>Role</label>
                <select class="form-select" name="role">
                  <option value="">Select One</option>
                  <option value="Full">Full</option>
                  <option value="Member">Member</option>
                  <option value="Guest">Guest</option>
                </select>
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
  <!-- Modal Edit Data-->
  <div class="modal fade" id="modalEditData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditTitle">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="edit-data-user" id="editData">
          <div class="modal-body">
            <input type="hidden" id="id" name="id"/>
            <div class="row">
              <div class="mb-3 fieldnya">
                <label class="user_id" for="user_id">User ID</label>
                <input type="text" class="form-control" id="user_id" placeholder="USER ID" name="user_id" aria-label="USER ID" required/>
              </div>
              <div class="mb-3 fieldnya">
                <label class="name" for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" aria-label="Name" required/>
              </div>
              <div class="mb-3 fieldnya">
                <label class="email" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" aria-label="Masukkan Email" required/>
              </div>
              <div class="mb-3 fieldnya">
                <label class="level" for="level" required>Level</label>
                <select id="level" class="form-select" name="level">
                  <option value="">Select One</option>
                  <option value="Admin">Admin</option>
                  <option value="User">User</option>
                </select>
              </div>
              <div class="mb-3 fieldnya">
                <label class="status" for="status" required>Status</label>
                <select id="status" class="form-select" name="status">
                  <option value="">Select One</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div class="mb-3 fieldnya">
                <label class="role" for="role" required>Role</label>
                <select id="role" class="form-select" name="role">
                  <option value="">Select One</option>
                  <option value="Full">Full</option>
                  <option value="Member">Member</option>
                  <option value="Guest">Guest</option>
                </select>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Ajax Sourced Server-side -->

@endsection
