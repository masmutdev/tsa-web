@extends('layouts/layoutHome')

@section('content')

<section class="bg-half bg-light d-table w-100">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <div class="page-next-level">
                  <h4 class="title">Artikel</h4>
                  <div class="page-next">
                      <nav aria-label="breadcrumb" class="d-inline-block">
                          <ul class="breadcrumb bg-white rounded shadow mb-0">
                              <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Artikel</li>
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
          <div class="col-lg-8 col-md-6">
              <div class="row">
                @if($Berita->isEmpty())
                    <div class="col-12">Berita Belum Diterbitkan</div>
                @else
                    @foreach($Berita as $news)
                    <div class="col-lg-6 col-md-12 mb-4 pb-2 post-item">
                      <div class="card blog rounded border-0 shadow">
                          <div class="position-relative"><img src="/storage/news_images/{{$news->image}}"
                                  class="card-img-top rounded-top" alt="{{ $news->title }}">
                              <div class="overlay rounded-top bg-dark"></div>
                          </div>
                          <div class="card-body content">
                              <h5><a href="/isi-berita/{{$news->id}}"
                                      class="card-title title text-dark">{{ $news->title }}</a>
                              </h5>
                              <p class="text-muted">
                                {!! Str::limit($news->content, 120, '...') !!}
                              </p>
                              <div class="post-meta d-flex justify-content-between mt-3">
                                  <ul class="list-unstyled mb-0">
                                      <li class="list-inline-item"><a href="javascript:void(0)"
                                              class="text-muted comments"><i
                                                  class="mdi mdi-comment-outline mr-1"></i><span
                                                  class="disqus-comment-count"
                                                  data-disqus-url="/isi-berita/{{$news->id}}">0</span></a>
                                      </li>
                                  </ul><a href="/isi-berita/{{$news->id}}"
                                      class="text-muted readmore">Baca <i class="mdi mdi-chevron-right"></i></a>
                              </div>
                          </div>
                          <div class="author"><small class="text-light user d-block"><i
                                  class="mdi mdi-account"></i> Administrator</small><small
                              class="text-light date"><i class="mdi mdi-calendar-check"></i> {{ $news->created_at }}</small></div>
                      </div>
                    </div>
                    @endforeach
                @endif

                  <div class="col-12">
                      <ul class="pagination justify-content-center mb-0">
                          <li class="page-item"><a class="page-link" href="javascript:void(0)"
                                  aria-label="Previous">Prev</a></li>
                          <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                          <li class="page-item"><a class="page-link" href="2/index.html">2</a></li>
                          <li class="page-item"><a class="page-link" href="2/index.html"
                                  aria-label="Next">Next</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
              <div class="card border-0 sidebar sticky-bar rounded shadow">
                  <div class="card-body">
                      <div class="widget mb-0 pb-2">
                          <h4 class="widget-title">Pencarian</h4>
                          <div id="search2" class="widget-search mt-4 mb-0">
                              <form role="search" action="#" method="POST" id="searchform" class="searchform">
                                  <div><input type="text" class="border rounded" name="keyword" id="search-input"
                                          autocomplete="off" placeholder="Masukkan kata kunci..." required></div>
                              </form>
                          </div>
                          <div class="mt-3" style="display: none;" id="search-results"></div>
                      </div>
                      <div id="search-outside">
                          <div class="widget mt-4 pb-2">
                              <h4 class="widget-title">Kategori</h4>
                              <ul class="list-unstyled mt-4 mb-0 blog-catagories">
                                  <li><a
                                          href="https://smkn1pml.sch.id/category/uncategorized/">Uncategorized</a><span
                                          class="float-right">1</span></li>
                                  <li><a href="https://smkn1pml.sch.id/category/berita/">Berita</a><span
                                          class="float-right">6</span></li>
                                  <li><a href="https://smkn1pml.sch.id/category/artikel/">Artikel</a><span
                                          class="float-right">1</span></li>
                              </ul>
                          </div>
                          <div class="widget mt-4 pb-2">
                              <h4 class="widget-title">Arsip 2023</h4>
                              <ul class="list-unstyled mt-4 mb-0 blog-catagories">
                                  <li><a href="https://smkn1pml.sch.id/2023/07/"> Juli </a><span
                                          class="float-right">1</span></li>
                                  <li><a href="https://smkn1pml.sch.id/2023/06/"> Juni </a><span
                                          class="float-right">1</span></li>
                                  <li><a href="https://smkn1pml.sch.id/2023/05/"> Mei </a><span
                                          class="float-right">1</span></li>
                              </ul>
                          </div>
                          <div class="widget mt-4 pb-2">
                              <h4 class="widget-title">Baca Juga</h4>
                              <div class="mt-4">
                                @foreach($Berita as $news)
                                <div class="clearfix post-recent">
                                  <div class="post-recent-thumb float-left">
                                      <a href="/isi-berita/{{ $news->id }}"><img src="/storage/news_images/{{ $news->image }}"
                                              class="img-fluid rounded" alt="{{ $news->title }}"></a>
                                  </div>
                                  <div class="post-recent-content float-left">
                                      <a href="/isi-berita/{{ $news->id }}">{{ $news->title }}</a>
                                      <span class="text-muted mt-2">{{ $news->created_at }}</span>
                                  </div>
                                </div>
                                @endforeach

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
