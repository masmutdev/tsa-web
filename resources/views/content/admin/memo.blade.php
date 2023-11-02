@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"> Memo</h4>

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

<!-- Memo -->
<div class="row mb-5">
  <div class="col-12 d-flex flex-row">
    <button data-bs-toggle="modal" data-bs-target="#modalTambahData" class="btn btn-primary me-2"><i class="bx bx-plus me-2"></i>Tambah Memo</button>
    <form action="{{ route('bersihkan-memo') }}" method="POST">
      @csrf
      @method('POST')
      <button type="submit" class="btn btn-danger me-2"><i class="bx bx-trash me-2"></i>Bersihkan Memo</button>
    </form>
  </div>
</div>
<div class="row mb-5">
  @if(count($memos) > 0)
      @foreach($memos as $memo)
          <div class="col-md-6 col-lg-4 mb-3">
              <div class="card mb-4">
                  <div class="card-body">
                      <div class="d-flex flex-row justify-content-between">
                          <h5 class="card-title">{{ $memo->title }}</h5>
                          <button data-bs-toggle="modal" data-bs-target="#modalEditData{{ $memo->id }}" class="btn btn-xs d-flex align-items-start"><i class="bx bx-edit-alt"></i></button>
                      </div>
                      <p class="card-text">
                          {{ $memo->content }}
                      </p>
                  </div>
              </div>
          </div>
          <!-- Modal Edit Data -->
          <div class="modal fade" id="modalEditData{{ $memo->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalEditTitle">Edit Memo</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/edit-memo" method="POST">
                          @csrf
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-12">
                                    <input type="hidden" name="id" value="{{ $memo->id }}">
                                    <div class="mb-3">
                                          <label class="title" for="title">Title</label>
                                          <input type="text" class="form-control" placeholder="Title" name="title" aria-label="title" value="{{ $memo->judul }}" required/>
                                      </div>
                                      <div class="mb-3">
                                          <label class="content" for="content">Memo Description</label>
                                          <textarea type="text" class="form-control" placeholder="Memo Description" name="content" aria-label="content" required>{{ $memo->isi }}</textarea>
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
      @endforeach
  @else
      <div class="col-12 d-flex justify-content-center">
          <p class="fw-bold">Belum Ada Memo</p>
      </div>
  @endif
</div>

<!-- Memo -->

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="modalTambahData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditTitle">Add Memo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/data-memo" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="title" for="title">Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title" aria-label="title" required/>
                </div>
                <div class="mb-3">
                  <label class="content" for="content">Memo Description</label>
                  <textarea type="text" class="form-control" placeholder="Memo Description" name="content" aria-label="content" required></textarea>
                </div>
                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" name="visibility" type="hidden" value="Member">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="Shared">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Private</label>
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

  <script>
    const checkbox = document.getElementById('flexSwitchCheckDefault');
    const visibilityInput = document.querySelector('input[name="visibility"]');
    const label = document.querySelector('.form-check-label[for="flexSwitchCheckDefault"]');

    checkbox.addEventListener('change', function () {
        if (this.checked) {
            visibilityInput.value = 'Shared';
            label.textContent = 'Shared';
        } else {
            visibilityInput.value = 'Member';
            label.textContent = 'Private';
        }
    });

    // Inisialisasi nilai visibility pada load halaman
    visibilityInput.value = 'Member';
</script>

@endsection
