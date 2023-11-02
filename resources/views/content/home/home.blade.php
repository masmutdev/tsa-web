
@extends('layouts/layoutHome')

@section('content')

    <section class="bg-half-170 d-table w-100"
        style="background: url('{{asset('home/images/bg.webp')}}'); background-position: center center; background-size: cover;"
        id="home">
        <div class="container">
            <div class="row position-relative align-items-center pt-4">
                <div class="col-lg-7 offset-lg-5">
                    <div class="title-heading studio-home rounded bg-white shadow mt-5">
                        <h1 class="heading mb-3">TSA Male Thursina IIBS</h1>
                        <p class="para-desc text-muted">Profesional and Open Minded Thursina IIBS Malang Organization
                        </p>
                        <div class="mt-4"><a href="page/ppdb/index.html" class="btn btn-primary mt-2 mr-2"><i
                                    class="mdi mdi-handshake"></i> Selengkapnya </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 col-12"><img src="{{asset('home/images/abouttsa.webp')}}" class="img-fluid rounded"
                        alt="" /></div>
                <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">Tentang TSA Male</h4>
                        <p class="text-muted"><span class="text-primary font-weight-bold">Thursina Student Association
                                (TSA)</span> adalah organisasi sekolah yang memfasilitasi kerja sama siswa SMP dan SMA
                            sebanyak
                            50 orang untuk mencapai tujuan bersama. Pengurus TSA dipilih melalui tes tahunan dan
                            terus memperbarui program kerjanya demi meningkatkan kualitas siswa Thursina IIBS.</p><a
                            href="/page/profil-tsa/index.html" class="btn btn-primary mt-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div
                        class="card features fea-primary rounded p-4 position-relative overflow-hidden border-0 shadow">
                        <span class="h1 icon2 text-primary"><i class="uil uil-briefcase"></i></span>
                        <div class="card-body p-0 content">
                            <h5>Visi</h5>
                            <p class="para text-muted mb-0">Menjadikan TSA organisasi yang professional dan Open Minded
                                dalam mewakili santri maupun mengembangkan karakter santri di Thursina IIBS.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div
                        class="card features fea-primary rounded p-4 position-relative overflow-hidden border-0 shadow">
                        <span class="h1 icon2 text-primary"><i class="uil uil-rocket"></i></span>
                        <div class="card-body p-0 content">
                            <h5>Misi</h5>
                            <ol class="para text-muted mb-0 pl-3">
                                <li>Melanjutkan dan meningkatkan program kerja TSA yang telah terlaksana maupun yang
                                    belum terlaksana dengan lancar
                                </li>
                                <li>Berusaha mengoptimalkan fungsi dan peran TSA serta meningkatkan kinerja dan
                                    kerjasama antar anggota</li>
                                <li>Menciptkakan sebuah organisasi yang mampu memimpin, mengiringi, serta memberi
                                    dorongan kepada santri</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                    <div
                        class="card features fea-primary rounded p-4 position-relative overflow-hidden border-0 shadow">
                        <span class="h1 icon2 text-primary"><i class="uil uil-crosshairs"></i></span>
                        <div class="card-body p-0 content">
                            <h5>Our Values</h5>
                            <p class="para text-muted mb-0 pl-3">TSA menjunjung tinggi nilai-nilai Thursina, yaitu
                                Religious, Caring, Open-Minded, Inspiring (RECODING), agar seluruh program kerja TSA
                                berjalan sesuai dengan profil Thursina.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-0 pb-2">
                        <h4 class="title mb-0">Divisi didalam TSA</h4>
                        <p class="text-muted para-desc mx-auto mb-0">TSA Male Memiliki <span
                                class="text-primary font-weight-bold">8 Divisi Inti</span>, antara lain</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/central/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid red">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Central</h4>
                                <p class="text-muted mb-0">divisi yang menjadi inti di dalam organisasi TSA. Divisi ini
                                    akan mengatur semua kerja divisi yang lain agar bisa terlaksana degan lancar dan
                                    baik.</p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/leadership/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid #ac00ac">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Leadership</h4>
                                <p class="text-muted mb-0">Divisi Leadership atau kerap disebut divisi keamanan adalah
                                    divisi yang bergerak dibidang keamanan, ketertiban, dan kedisiplinan santri</p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/religi/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid blue">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Religi</h4>
                                <p class="text-muted mb-0">Bidang keagamaan yang bertujuan untuk
                                    menumbuhkan jiwa religius dan menyediakan wadah untuk meningkatkan keterampilan
                                    untuk berdakwah</p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/language/index.html" target="_blank">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid #3bba00">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Language</h4>
                                <p class="text-muted mb-0">The Language Division fosters linguistic empowerment by
                                    nurturing language skills in our school's communities, unlocking boundless
                                    linguistic opportunities
                                </p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/public-relation/index.html" target="_blank">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid #edff00">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Public Relation</h4>
                                <p class="text-muted mb-0">divisi yang bertanggung jawab atas pengelolaan dan
                                    dokumentasi seluruh kegiatan TSA. Tim kami berfokus untuk mengembangkan dan
                                    mempublikasikan kegiatan TSA melalui platform digital</p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/language/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid grey">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Education</h4>
                                <p class="text-muted mb-0">Divisi Edukasi adalah divisi yang bergerak di bidang
                                    pendidikan. Divisi ini akan menyampaikan berbagai pengetahuan, keterampilan, dan
                                    lain lain agar dapat dicerna oleh santri. </p>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/entrepreneur/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid orange">
                            <div class="media-body ml-3">
                                <h4 class="title mb-0 text-dark">Entrepreneur</h4>
                                <p class="text-muted mb-0">Divisi Entrepreneur adalah Divisi yang bertanggung jawab
                                    dalam hal pencarian sumber pemasukan dan pengelolaan keuangan organisasi TSA. </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2"><a href="/divisi/sportandart/index.html">
                        <div class="media key-feature align-items-center p-3 rounded shadow bg-white"
                            style="border: 1px solid rgb(0, 225, 255)">
                            <div class="media-body ml-3S">
                                <h4 class="title mb-0 text-dark">Sport and Art</h4>
                                <p class="text-muted mb-0">divisi yang bergerak di bidang olahraga dan kesenian. Divisi
                                    ini akan membantu para santri dalam mengembangkan skill yang mereka miliki.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="col-12 text-center">
                        <div class="section-title mb-0 pb-2">
                            <h4 class="title mb-0">Berita Terbaru</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Berita Terbaru dari <span
                                    class="text-primary font-weight-bold">TSA Male</span></p>
                        </div>
                    </div>
                </div>
            </div>
              @if(count($Berita) > 0)
                <div class="row">
                  @foreach($Berita as $berita)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="/storage/news_images/{{$berita->image }}" class="card-img-top rounded-top" alt="{{ $berita->title }}" />
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="/isi-berita/{{$berita->id}}" class="card-title title text-dark">{{ $berita->title }}</a></h5>
                                <p class="text-muted">{!! Str::limit($berita->content, 120, '...') !!}</p>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted comments">
                                                <i class="mdi mdi-comment-outline mr-1"></i>
                                                <span class="disqus-comment-count" data-disqus-url="/isi-berita/{{$berita->id}}">0</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a href="/isi-berita/{{$berita->id}}" class="text-muted readmore">Baca <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="mdi mdi-account"></i>Administrator</small>
                                <small class="text-light date"><i class="mdi mdi-calendar-check"></i> {{ $berita->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
              @else
                  <div class="col-12 pt-2">
                      <p class="text-center">Berita belum diterbitkan</p>
                  </div>
              @endif
    </section>
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="col-12 text-center">
                        <div class="section-title mb-0 pb-2">
                            <h4 class="title mb-0">Upcoming Events</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Events dari <span
                                    class="text-primary font-weight-bold">TSA Male </span>yang akan Datang,</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($Upcoming) > 0)
            <div class="row">
              @foreach($Upcoming as $ue)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img src="/storage/news_images/{{$ue->image }}" class="card-img-top rounded-top" alt="{{ $ue->title }}" />
                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5><a href="/isi-berita/{{$ue->id}}" class="card-title title text-dark">{{ $ue->title }}</a></h5>
                            <p class="text-muted">{!! Str::limit($ue->content, 120, '...') !!}</p>
                            <div class="post-meta d-flex justify-content-between mt-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="text-muted comments">
                                            <i class="mdi mdi-comment-outline mr-1"></i>
                                            <span class="disqus-comment-count" data-disqus-url="/isi-berita/{{$ue->id}}">0</span>
                                        </a>
                                    </li>
                                </ul>
                                <a href="/isi-berita/{{$ue->id}}" class="text-muted readmore">Baca <i class="mdi mdi-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user d-block"><i class="mdi mdi-account"></i>Administrator</small>
                            <small class="text-light date"><i class="mdi mdi-calendar-check"></i> {{ $ue->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
          @else
              <div class="col-12 pt-2">
                  <p class="text-center">Belum Ada Upcoming Events</p>
              </div>
          @endif
    </section>

@endsection
