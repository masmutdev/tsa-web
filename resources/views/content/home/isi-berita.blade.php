@extends('layouts/layoutHome')

@section('content')

<section class="bg-half bg-light d-table w-100">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <div class="page-next-level">
                  <h2>{{$Berita->title}}</h2>
                  <ul class="list-unstyled mt-4">
                      <li class="list-inline-item h6 user text-muted mr-2"><i class="mdi mdi-account"></i>
                          Administrator</li>
                      <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i>
                        {{$Berita->created_at}}</li>
                  </ul>
                  <div class="page-next">
                      <nav aria-label="breadcrumb" class="d-inline-block">
                          <ul class="breadcrumb bg-white rounded shadow mb-0">
                              <li class="breadcrumb-item"><a href="../../index.html">Beranda</a></li>
                              <li class="breadcrumb-item"><a
                                      href="https://smkn1pml.sch.id/category/uncategorized/">Uncategorized</a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">{{$Berita->title}}
                              </li>
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
      <div class="row">
          <div class="">
              <div class="card blog blog-detail border-0 shadow rounded"><img
                      src="/storage/news_images/{{$Berita->image}}" class="img-fluid rounded-top"
                      alt="Halo Thursina Student Association">
                  <div class="card-body content">
                      <h6><i class="mdi mdi-tag text-primary mr-1"></i><a href="" class="text-primary">welcome</a>
                      </h6>
                      <div class="article-style">
                          <p>{!! $Berita->content !!}</p>
                      </div>
                      <div class="post-meta mt-3">
                          <ul class="list-unstyled mb-0">
                              <li class="list-inline-item"><a href="javascript:void(0)"
                                      class="text-muted comments"><i
                                          class="mdi mdi-comment-outline mr-1"></i><span
                                          class="disqus-comment-count" data-disqus-url="index.html">0</span></a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="card shadow rounded border-0 mt-4">
                  <div class="card-body">
                      <h5 class="card-title mb-0">Artikel Lainnya</h5>
                      <div class="row">

                        @if($allBerita->isEmpty())
                        <div class="col-12">Belum Ada Berita Lainnya</div>
                        @else
                            @foreach($allBerita as $semua)
                                @if($semua->id != $Berita->id) {{-- Periksa apakah ID tidak sama dengan ID yang ditangkap --}}
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="card blog rounded border-0 shadow">
                                        <div class="position-relative"><img
                                                src="/storage/news_images/{{$semua->image}}"
                                                class="card-img-top rounded-top" alt="Info Daftar Ulang PPDB 2021">
                                            <div class="overlay rounded-top bg-dark"></div>
                                        </div>
                                        <div class="card-body content">
                                            <h5><a href="#"
                                                    class="card-title title text-dark">{{$semua->title}}</a>
                                            </h5>
                                            <div class="post-meta d-flex justify-content-between mt-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item"><a href="javascript:void(0)"
                                                            class="text-muted comments"><i
                                                            class="mdi mdi-comment-outline mr-1"></i><span
                                                            class="disqus-comment-count"
                                                            data-disqus-url="#">0</span></a>
                                                    </li>
                                                </ul><a href="#"
                                                    class="text-muted readmore">Baca <i
                                                        class="mdi mdi-chevron-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="author"><small class="text-light user d-block"><i
                                                class="mdi mdi-account"></i> Administrator</small><small
                                                class="text-light date"><i class="mdi mdi-calendar-check"></i>
                                                {{$semua->created_at}}</small></div>
                                    </div>
                                </div>
                                @else
                                <div class="col-12">Belum Ada Berita Lainnya</div>
                                @endif
                            @endforeach
                        @endif


                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
