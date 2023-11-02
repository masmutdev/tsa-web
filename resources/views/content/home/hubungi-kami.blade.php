@extends('layouts/layoutHome')

@section('content')

<section class="bg-half bg-light d-table w-100">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <div class="page-next-level">
                  <h4 class="title">Hubungi Kami</h4>
                  <div class="page-next">
                      <nav aria-label="breadcrumb" class="d-inline-block">
                          <ul class="breadcrumb bg-white rounded shadow mb-0">
                              <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
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
<section class="section pb-0">
  <div class="container">
      <div class="row">
          <div class="col-md-4">
              <div class="card contact-detail text-center border-0">
                  <div class="card-body p-0">
                      <div class="icon"><img src="./assets/images/icon/call.svg"
                              class="avatar avatar-small" alt="" /></div>
                      <div class="content mt-3">
                          <h4 class="title font-weight-bold">Telepon</h4>
                          <p class="text-muted">Silahkan hubungi nomor dibawah ini terkait TSA Male jika memiliki
                              Keperluan, Pengajuan Proposal dan lain sebagainya</p><a
                              href="tel:081615559454" class="text-primary">081615559454</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
              <div class="card contact-detail text-center border-0">
                  <div class="card-body p-0">
                      <div class="icon"><img src="./assets/images/icon/email.svg"
                              class="avatar avatar-small" alt="" /></div>
                      <div class="content mt-3">
                          <h4 class="title font-weight-bold">Email</h4>
                          <p class="text-muted">Silahkan hubungi Email dibawah ini terkait TSA Male jika memiliki
                              Keperluan, Pengajuan Proposal dan lain sebagainya</p><a
                              href="mailto:contact@tsamale.com" class="text-primary">contact@tsamale.com</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
              <div class="card contact-detail text-center border-0">
                  <div class="card-body p-0">
                      <div class="icon"><img src="./assets/images/icon/location.svg"
                              class="avatar avatar-small" alt="" /></div>
                      <div class="content mt-3">
                          <h4 class="title font-weight-bold">Lokasi</h4>
                          <p class="text-muted">Thursina Edu-Hill, Jl. Tirto Sentono 15,
                              Landungsari, Dau, Malang 65151</p><a href="https://maps.app.goo.gl/JKPz3evhWMMLsJhm6"
                              class="video-play-icon h6 text-primary">Lihat di Google Maps</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid mt-100 mt-60">
      <div class="row">
          <div class="col-12 p-0">
              <div class="card map border-0">
                  <div class="card-body p-0"><iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6470741372723!2d112.57266677422581!3d-7.931879278985651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78822da9f07bf1%3A0x886787dc5b685fda!2sThursina%20IIBS%20Putra!5e0!3m2!1sid!2sid!4v1697812264462!5m2!1sid!2sid"
                          width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                          aria-hidden="false" tabindex="0"></iframe></div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
