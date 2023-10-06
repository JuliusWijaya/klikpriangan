<!-- Footer Start-->
<footer>
    <div class="footer-main footer-bg">
      <div class="footer-area footer-padding">
        <div class="container">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">
                  <!-- logo -->
                  <div class="footer-logo">
                    <a href="/"><img src="/assets/img/logo/klikprianganwhite.png" class="w-100" alt="" /></a>
                  </div>
                  <div class="footer-tittle">
                    <div class="footer-pera">
                      <p class="info1 mb-1 text-white">Jl. Ir. H Juanda No.169 A</p>
                      <p class="info2 mb-1 text-white">Kota Tasikmalaya</p>
                      <p class="info2 text-white">Email : hukabarpriangan@gmail.com</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <p class="okes text-white">KLIK PRIANGAN</p>
                  @foreach ($categories as $category)
                  <a href="/category/{{ $category->slug }}">
                    <p class="text-white">{{ $category->name }}</p>
                  </a>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
              <div class="single-footer-caption mb-50">
                <div class="banner">
                  <p class="text-white">PT. PRIANGAN WAHANA MEDIA</p>
                  <p class="text-white">Jl. Insinyur Haji Juanda No.169 RT.001 RW.003</p>
                  <p class="text-white">Kota Tasikmalaya Jawa Barat</p>
                  <p class="text-white">Email: institutepriangan@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="d-block">
              <p>
                <a href="/pages/about">Tentang Kami</a> | 
                <a href="/redaksi">Redaksi</a> | 
                <a href="/pedoman-media-siber">Pedoman Pemberitaan</a> | 
                <a href="/info-iklan">Info Iklan</a> | 
                <a href="/kontak">Kontak</a> |
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- footer-bottom aera -->
      <div class="footer-bottom-area footer-bg">
        <div class="container">
          <div class="footer-border">
            <div class="row d-flex align-items-center">
              <div class="col-xl-12">
                <div class="footer-copy-right text-center">
                  <p>
                    Copyright &copy;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    PT. Priangan Wahana Media All right reserved
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End-->
