 <!-- Preloader Start -->
 <div id="preloader-active">
     <div class="preloader d-flex align-items-center justify-content-center">
         <div class="preloader-inner position-relative">
             <div class="preloader-circle"></div>
             <div class="preloader-img pere-text">
                 <img src="/assets/img/logo/logoklik.png" alt="">
             </div>
         </div>
     </div>
 </div>
 <!-- Preloader Start -->

 <header>
     <!-- Header Start -->
     <div class="header-area">
         <div class="main-header ">
             <div class="header-top black-bg d-none d-sm-block">
                 <div class="container">
                     <div class="col-xl-12">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="header-info-left">
                                 <ul>
                                     <li class="title"> {{  $days.', '.date('d-m-Y') }}</li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="header-mid gray-bg">
                 <div class="container">
                     <div class="row d-flex align-items-center">
                         <!-- Logo -->
                         <div class="col-xl-12 col-lg-3 col-md-3 d-none d-md-block">
                             <div class="logo">
                                 <a href="/"><img src="/assets/img/logo/logoklik.png" alt="logo" class="w-0"></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="header-bottom header-sticky">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                             <!-- sticky -->
                             <div class="sticky-logo">
                                 <a href="/"><img src="/assets/img/logo/logoklik.png" alt=""></a>
                             </div>
                             <!-- Main-menu -->
                             <div class="main-menu d-none d-md-block">
                                 <nav>
                                     <ul id="navigation">
                                         <li><a href="/">Klik Priangan</a></li>
                                         @foreach ($categories as $item)
                                         <li>
                                             <a href="/category/{{ $item->slug }}">{{ $item->name }}</a>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                         <div class="col-xl-4 col-lg-4 col-md-4">
                             <div class="header-right f-right d-none d-lg-block">
                                 <!-- Heder social -->
                                 <ul class="header-social">
                                     <li><a href="#"><i class="fab fa-facebook-f"></i></a>
                                     </li>
                                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                     <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                 </ul>
                                 <!-- Search Nav -->
                                 <div class="nav-search search-switch">
                                     <i class="fa fa-search"></i>
                                 </div>
                             </div>
                         </div>
                         <!-- Mobile Menu -->
                         <div class="col-12">
                             <div class="mobile_menu d-block d-md-none"></div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="container">
                 <div class="row d-flex align-items-center">
                     <div class="col-xl-9 col-lg-12 col-md-9 my-5">
                         <div class="header-banner f-right ">
                             <ins class="adsbygoogle" style="display: block; height: 100px;" data-ad-format="fluid"
                                 data-ad-layout-key="-46+cz+1v-cs+cm" data-ad-client="ca-pub-7841575252065657"
                                 data-ad-slot="3276613689" data-adsbygoogle-status="done" data-ad-status="unfilled">
                                 <div id="aswift_2_host"
                                     style="border: none; height: 250px; width: 970px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block;"
                                     tabindex="0" title="Advertisement" aria-label="Advertisement">
                                     <iframe id="aswift_2"
                                         name="aswift_2"
                                         style="left:0;position:absolute;top:0;border:0;width:970px;height:250px;"
                                         sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                                         width="1200" height="300" frameborder="0" marginwidth="0" marginheight="0"
                                         vspace="0" hspace="0" allowtransparency="true" scrolling="no"
                                         src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-7841575252065657&amp;output=html&amp;h=796&amp;slotname=3276613689&amp;adk=355893656&amp;adf=1573534164&amp;pi=t.ma~as.3276613689&amp;w=1200&amp;lmt=1697100603&amp;rafmt=11&amp;format=1200x796&amp;url=https%3A%2F%2Fklikpriangan.com%2F&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTAuMC4wIiwieDg2IiwiIiwiMTE3LjAuMjA0NS42MCIsW10sMCxudWxsLCI2NCIsW1siTWljcm9zb2Z0IEVkZ2UiLCIxMTcuMC4yMDQ1LjYwIl0sWyJOb3Q7QT1CcmFuZCIsIjguMC4wLjAiXSxbIkNocm9taXVtIiwiMTE3LjAuNTkzOC4xNTAiXV0sMF0.&amp;dt=1697100603491&amp;bpp=3&amp;bdt=1212&amp;idt=292&amp;shv=r20231004&amp;mjsv=m202310040101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3Da13a11a146086c41-2250cfe810e400d1%3AT%3D1695628165%3ART%3D1697083348%3AS%3DALNI_MYGZAezGysHEibKK2Lrd6Cq2GaE6A&amp;gpic=UID%3D00000c53de28f556%3AT%3D1695628165%3ART%3D1697083348%3AS%3DALNI_MaskupbttOQyGrtE3sUKkYjG9_DDw&amp;prev_fmts=0x0%2C1200x200&amp;nras=1&amp;correlator=110911300095&amp;frm=20&amp;pv=1&amp;ga_vid=1838653669.1695628165&amp;ga_sid=1697100604&amp;ga_hid=72526234&amp;ga_fc=1&amp;u_tz=420&amp;u_his=3&amp;u_h=864&amp;u_w=1536&amp;u_ah=834&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.25&amp;dmc=8&amp;adx=0&amp;ady=200&amp;biw=1513&amp;bih=760&amp;scr_x=0&amp;scr_y=1798&amp;eid=44759926%2C44759837%2C44759875%2C31077327%2C31078594%2C42531705%2C42532263%2C44798934%2C44804782%2C44805099%2C31078297%2C31078679&amp;oid=2&amp;pvsid=1731055112090493&amp;tmod=361105924&amp;wsm=1&amp;uas=0&amp;nvt=1&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C834%2C1528%2C760&amp;vis=1&amp;rsz=%7C%7CEe%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;ifi=3&amp;uci=a!3&amp;fsb=1&amp;xpc=wOQ13ruO6F&amp;p=https%3A//klikpriangan.com&amp;dtd=303"
                                         data-google-container-id="a!3" data-load-complete="true"
                                         data-google-query-id="CIzTjbWQ8IEDFRP0aAodvqQAxQ">
                                     </iframe>
                                 </div>
                             </ins>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>
