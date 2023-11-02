<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="{{asset('home/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('home/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/owl.theme.default.min.css')}}" />
    <link href="{{asset('home/css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('home/css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    <link href="{{asset('home/css/custom.css')}}" rel="stylesheet" id="color-opt">
</head>

<body>
    <noscript> Hi User! Please Enable your Javascript on your Browser to see this Website, Thanks! </noscript>
      <!-- Header -->
      <header id="topnav" class="defaultscroll sticky bg-white">
        <div class="container">
            <div><a class="logo" href="/" title="Thursina Student Association Male"><img src="{{asset('home/images/logotsa1.png')}}"
                        height="70" alt="Thursina Student Association Male"></a></div>
            <div class="buy-button"><a href="http://app.tsamale.com/kotaksaran/" rel="noindex, nofollow" target="_blank"
                    class="btn btn-primary mdi mdi-mail"> Kotak Saran</a></div>
            <div class="menu-extras">
                <div class="menu-item"><a class="navbar-toggle">
                        <div class="lines"><span></span><span></span><span></span></div>
                    </a></div>
            </div>
            <div id="navigation">
                <ul class="navigation-menu">
                    <li><a href="/">Beranda</a></li>
                    <li class="has-submenu"><a href="javascript:void(0)">Profil TSA</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="/profil-tsa">Profil TSA</a></li>
                            <li><a href="/visi-misi">Visi & Misi</a></li>
                            <li><a href="/struktur-organisasi">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu"><a href="javascript:void(0)">Divisi</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="/central">Central</a></li>
                            <li><a href="/leadership">Leadership</a></li>
                            <li><a href="/education">Education</a></li>
                            <li><a href="/public-relation">Public Relation</a></li>
                            <li><a href="/sport-art">Sport and Art</a></li>
                            <li><a href="/entrepreneur">Entrepreneur</a></li>
                            <li><a href="/language">Language</a></li>
                        </ul>
                    </li>
                    <li><a href="/berita">Berita</a></li>
                    <li><a href="/gallery">Galeri</a></li>
                    <li><a href="/hubungi-kami">Hubungi Kami</a></li>
                </ul>
                <div class="buy-menu-btn d-none"><a href="https://app.tsamale.com/kotaksaran/" rel="noindex, nofollow"
                        target="_blank" class="btn btn-primary mdi mdi-mail"> Kotak Saran</a></div>
            </div>
        </div>
      </header>
      <!-- Header End -->

    @yield('content')

    <!-- Footer Start -->
    <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2"><a class="logo" href="/"
                      title="TSA Male" class="logo-footer"><img src="{{asset('home/images/logotsawh.png')}}" height="100"
                          alt="TSA Male"></a>
                  <p class="mt-4">Profesional and Open Minded Thursina IIBS Malang Organization
                  </p>
                  <ul class="list-unstyled social-icon social mb-0 mt-4">
                      <li class="list-inline-item"><a href="#" class="rounded" target="_blank"><i
                                  data-feather="facebook" class="fea icon-sm fea-social"></i></a>
                          &#xA0; <a href="https://www.instagram.com/tsa.male/" class="rounded" target="_blank"><i
                                  data-feather="instagram" class="fea icon-sm fea-social"></i></a> &#xA0; <a
                              href="https://www.youtube.com/@tsamale2500" class="rounded" target="_blank"><i
                                  data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                  </ul>
              </div>
              <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                  <h4 class="text-light footer-head">Support Link</h4>
                  <ul class="list-unstyled footer-list mt-4">
                      <li><a href="http://thursinaiibs.sch.id" rel="noindex, nofollow" class="text-foot"
                              target="_blank"><i class="mdi mdi-chevron-right mr-1"></i> Thursina IIBS</a></li>
                      <li><a href="http://tses.thursinaiibs.sch.id" rel="noindex, nofollow" class="text-foot"
                              target="_blank"><i class="mdi mdi-chevron-right mr-1"></i> TSES for Student</a></li>
                      <li><a href="http://tses.thursinaiibs.sch.id/elib" rel="noindex, nofollow" class="text-foot"
                              target="_blank"><i class="mdi mdi-chevron-right mr-1"></i> E-Library</a></li>
                      <li><a href="http://app.tsamale.com" rel="noindex, nofollow" class="text-foot"
                              target="_blank"><i class="mdi mdi-chevron-right mr-1"></i> TSA Male App</a></li>
                  </ul>
              </div>
              <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                  <h4 class="text-light footer-head">TSA Tags</h4>
                  <div class="tagcloud mt-4"><a href="#" class="rounded">TSAMALE</a><a href="#"
                          class="rounded">THURSINAIIBS</a><a href="#" class="rounded">OSISTHURSINA</a><a href="#"
                          class="rounded">THURSINAMALE</a><a href="#" class="rounded">ARTICLES</a></div>
              </div>
              <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                  <h4 class="text-light footer-head">Informasi Kontak</h4>
                  <ul class="list-unstyled footer-list mt-4">
                      <li><span class="text-foot" rel="noindex, nofollow" target="_blank"><i
                                  class="mdi mdi-google-maps mr-1"></i> Thursina Edu-Hill, Jl. Tirto Sentono 15,
                              Landungsari, Dau, Malang 65151</span></li>
                      <li><span class="text-foot"><i class="mdi mdi-phone mr-1"></i> 081615559454 (TSA Male)</span>
                      </li>
                      <li><span class="text-foot"><i class="mdi mdi-phone mr-1"></i> (0341) 463838 (Thursina
                              IIBS)</span>
                      </li>
                      <li><span class="text-foot"><i class="mdi mdi-email mr-1"></i> contact@tsamale.com</span></li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <footer class="footer footer-bar">
      <div class="container text-center">
          <div class="row align-items-center">
              <div class="col-sm-12">
                  <div class="text-sm-left">
                      <p class="mb-0">&copy; 2023 Thursina Student Association Male. All Rights Reserved.</p>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <a href="#" rel="noindex, nofollow" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up"
          class="icons"></i></a>
  <!-- Footer End -->


  <script src="{{asset('home/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('home/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('home/js/scrollspy.min.js')}}"></script>
  <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('home/js/owl.init.js')}}"></script>
  <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('home/js/isotope.js')}}"></script>
  <script src="{{asset('home/js/portfolio.init.js')}}"></script>
  <script src="{{asset('home/js/feather.min.js')}}"></script>
  <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
  <script src="{{asset('home/js/app.js')}}"></script>
  <script src="{{asset('home/js/search.js')}}"></script>
</body>

</html>
