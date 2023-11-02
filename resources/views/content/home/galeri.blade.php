@extends('layouts/layoutHome')

@section('content')

<section class="bg-half bg-light d-table w-100">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <div class="page-next-level">
                  <h2>Galeri TSA</h2>
                  <div class="page-next">
                      <nav aria-label="breadcrumb" class="d-inline-block">
                          <ul class="breadcrumb bg-white rounded shadow mb-0">
                              <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Galeri TSA</li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<div class="position-relative">
  <div class="shape overflow-hidden text-white"><svg viewBox="0 0 2880 48" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
      </svg></div>
</div>
<section class="section">
  <div class="container-fluid">
      <div class="row container-grid projects-wrapper">
          <div class="col-lg-3 col-md-6 col-12 spacing mt-3 guru">
              <div
                  class="card border-0 work-container work-grid position-relative d-block overflow-hidden rounded">
                  <div class="card-body p-0"><a class="mfp-image d-inline-block"
                          href="././res.cloudinary.com/smkn1pml/image/upload/v1612078632/whatsapp-image-2020-12-16-at-09.27.52_x2d6es.jpg"
                          title="Guru TKJ"><img
                              src="././res.cloudinary.com/smkn1pml/image/upload/v1612078632/whatsapp-image-2020-12-16-at-09.27.52_x2d6es.jpg"
                              class="img-fluid" alt="work-image" /></a>
                      <div class="content bg-white p-3">
                          <h5 class="mb-0"><a href="javascript:void(0)" class="text-dark title">Guru TKJ</a></h5>
                          <h6 class="text-muted tag mb-0">Tim Pengajar Kompetensi Keahlian Teknik Komputer
                              Jaringan</h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
