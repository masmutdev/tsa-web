@extends('layouts/layoutHome')

@section('content')

<section class="bg-half bg-light d-table w-100">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <div class="page-next-level">
                  <h4 class="title">Visi & Misi TSA Male</h4>
                  <ul class="list-unstyled mt-4">
                      <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i>
                          Last Updated 21/10/2023</li>
                  </ul>
                  <div class="page-next">
                      <nav aria-label="breadcrumb" class="d-inline-block">
                          <ul class="breadcrumb bg-white rounded shadow mb-0">
                              <li class="breadcrumb-item"><a href=".//">Beranda</a></li>
                              <li class="breadcrumb-item"><a href="javascript:void(0)">Profil TSA</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
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
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-9">
              <div class="card shadow border-0 rounded">
                  <div class="card-body article-style">
                      <h4>
                          <center><b>VISI</b></center>
                      </h4>
                      <p>Menjadikan TSA organisasi yang professional dan Open Minded dalam mewakili santri maupun
                          mengembangkan karakter santri di Thursina IIBS.</p>
                      <h4>
                          <center><b>MISI</b></center>
                      </h4>
                      <ol>
                          <li>Melanjutkan dan meningkatkan program kerja TSA yang telah terlaksana maupun yang
                              belum terlaksana dengan lancar</li>
                          <li>Berusaha mengoptimalkan fungsi dan peran TSA serta meningkatkan kinerja dan
                              kerjasama antar anggota</li>
                          <li>Menciptakan sebuah organisasi yang mampu memimpin, mengiringi, serta memberi
                              dorongan kepada santri</li>
                      </ol>
                      <h4>
                          <center><b>OUR VALUES</b></center>
                      </h4>
                      <p>TSA menjunjung tinggi nilai-nilai Thursina, yaitu Religious, Caring, Open-Minded,
                          Inspiring (RECODING), agar seluruh program kerja TSA berjalan sesuai dengan profil
                          Thursina.</p>

                  </div>
              </div>
          </div>
      </div>
</section>

@endsection
