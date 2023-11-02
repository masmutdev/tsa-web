@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/plyr/plyr.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/plyr/plyr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/extended-ui-media-player.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"> Files Manager</h4>

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

<div class="row mb-5">
  <div class="col-12 d-flex flex-row mb-4">
    <button data-bs-toggle="modal" data-bs-target="#modalTambahData" class="btn btn-primary me-2"><i class="bx bx-plus me-2"></i>Tambah File</button>
    <form action="{{ route('bersihkan-files') }}" method="POST">
      @csrf
      @method('POST')
      <button type="submit" class="btn btn-danger me-2"><i class="bx bx-trash me-2"></i>Bersihkan File</button>
    </form>
  </div>
  <div class="col-lg-3">
    <div class="card mb-4">
      <div class="card-body">
        <div class="col-12">
          <div class="d-flex flex-row justify-content-start text-left mb-3">
            <button class="btn btn-light w-100 d-flex justify-content-start fw-bold"><i class="bx bxs-image me-2"></i>Images</button>
          </div>
          <div class="d-flex flex-row justify-content-start text-left mb-3">
            <button class="btn btn-light w-100 d-flex justify-content-start fw-bold"><i class="bx bxs-video me-2"></i>Videos</button>
          </div>
          <div class="d-flex flex-row justify-content-start text-left mb-3">
            <button class="btn btn-light w-100 d-flex justify-content-start fw-bold"><i class="bx bxs-file-blank me-2"></i>Documents</button>
          </div>
          <div class="d-flex flex-row justify-content-start text-left mb-3">
            <button class="btn btn-light w-100 d-flex justify-content-start fw-bold"><i class="bx bxs-user-plus me-2"></i>Shared</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <div class="row mb-5">
      @foreach($userFiles as $file)
      <div class="col-md-6 col-lg-4 mb-3">
          <div class="card mb-4">
              <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                      <h5 class="card-title">{{ $file->file_name }}</h5>
                  </div>
                  <div class="d-flex flex-column justify-content-center align-items-center">
                      @php
                          $extension = pathinfo($file->file_name, PATHINFO_EXTENSION);
                          $imagePath = '';
                          switch($extension) {
                              case 'jpeg':
                              case 'jpg':
                              case 'heic':
                              case 'gif':
                              case 'png':
                              case 'svg':
                              case 'webp':
                                  $imagePath = '/storage/files_manager/' . $file->file_name;
                                  @endphp
                                  <img class="rounded" src="{{ asset($imagePath) }}" width="100px" alt="{{ $file->file_name }}" srcset="">
                                  @php
                                  break;
                              case 'mp4':
                              case '3gp':
                              case 'mov':
                              case 'mkv':
                              case 'avi':
                              case 'webm':
                              case 'gifv':
                              case 'mpg':
                                  @endphp
                                  <video class="w-100" poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="plyr-video-player" playsinline controls>
                                      <source src="{{ asset('/storage/files_manager/' . $file->file_name) }}" type="video/mp4" />
                                  </video>
                                  @php
                                  break;
                              case 'mp3':
                              case 'ogg':
                              case 'mpc':
                              case 'wma':
                              case 'aac':
                              case 'raw':
                              case 'midi':
                              case 'wav':
                              case 'aiff':
                              case 'pcm':
                              case 'flac':
                                  $imagePath = 'assets/img/sound.png';
                                  break;
                              case 'zip':
                              case 'rar':
                                  $imagePath = 'assets/img/folder.png';
                                  break;
                              default:
                                  $imagePath = 'assets/img/default.png';
                          }
                      @endphp

                      <p class="card-text text-center mt-4 fw-semibold">
                          {{ $file->file_name }}
                      </p>
                      <div class="d-flex justify-content-center">
                          <a href="/storage/files_manager/{{ $file->file_name }}" class="btn btn-primary" download><i class="bx bx-download me-2"></i> Download</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @endforeach

    </div>
  </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambahData" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditTitle">Add File</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/upload-file" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="file_name" for="file_name">File Name</label>
                    <input type="text" class="form-control" placeholder="File Name" name="file_name" aria-label="File Name" required/>
                  </div>
                  <div class="mb-3">
                    <label class="file_description" for="file_description">File Description</label>
                    <textarea type="text" class="form-control" placeholder="File Description" name="file_description" aria-label="File Description" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="content" for="content">File Upload</label>
                   <input class="form-control" type="file" name="file_data" required>
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
</div>

    <!-- Modal Preview -->
    <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditTitle">Add File</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/upload-file" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="file_name" for="file_name">File Name</label>
                    <input type="text" class="form-control" placeholder="File Name" name="file_name" aria-label="File Name" required/>
                  </div>
                  <div class="mb-3">
                    <label class="file_description" for="file_description">File Description</label>
                    <textarea type="text" class="form-control" placeholder="File Description" name="file_description" aria-label="File Description" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="content" for="content">File Upload</label>
                    <input class="form-control" type="file" name="file_data" required>
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
