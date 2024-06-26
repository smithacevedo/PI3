<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>biblioTec | 1.0</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <!--
      {{ asset('assets/vendor/js/helpers.js') }}
    -->


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
         
          <ul class="menu-inner py-1">
            <!-- home -->
            <li class="menu-item active">
              <a href="/biblioTec" class="menu-link" onclick="window.location.reload();">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>


            <!-- Libro -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-book"></i>
                  <div data-i18n="Libro">Libro</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/libro/create" class="menu-link">
                    <div data-i18n="Crear Libro">Crear Libro</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/libro" class="menu-link">
                    <div data-i18n="Editar O Eliminar Libro">Visualizar</div>
                  </a>
                </li>
              </ul>
            </li>

            <!--Autor -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-pencil"></i>
                <div data-i18n="Layouts">Autor</div>
            </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/autor/create" class="menu-link">
                    <div data-i18n="Without menu">Crear Autor</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/autor" class="menu-link">
                    <div data-i18n="Without navbar">Visualizar</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Lector -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Lector">Lector</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/lector/create" class="menu-link">
                    <div data-i18n="Crear Lector">Crear Lector</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/lector" class="menu-link">
                    <div data-i18n="Editar O Eliminar Lector">Visualizar</div>
                  </a>
                </li>
              </ul>
            </li>      

            <!-- Prestamo -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                  <div data-i18n="Prestamo">Prestamo</div>
              </a>

              <ul class="menu-sub">
                  <li class="menu-item">
                      <a href="/prestamo/create" class="menu-link">
                          <div data-i18n="Crear Prestamo">Crear Prestamo</div>
                      </a>
                  </li>
                  <li class="menu-item">
                      <a href="/prestamo" class="menu-link">
                          <div data-i18n="Visualizar Prestamo">Visualizar Prestamo</div>
                      </a>
                  </li>
              </ul>
            </li>

            <!-- Multa -->
            <li class="menu-item">
              <a href="/multa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wallet"></i>
                <div data-i18n="Multa">Multas</div>
            </a>


          </ul>
          <div class="card-body">
            <div class="mb-2 mb-md-0 text-sm-right">
                <a href="{{ route('login.destroy') }}" class="btn btn-danger border">Cerrar sesión</a>
            </div>
          </div>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">BIBLIOTEC</h5>
                          <p class="mb-4">
                            Bienvenido a <span class="fw-bold">BIBLIOTEC</span>
                          </p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">

                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      
                    </div>
                  </div>
                </div>
                <!-- Total Revenue
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">biblioTec</h5>
                       @yield('content')
                      </div>
                    </div>
                  </div>
                </div>
                / Total Revenue -->
                   </div>
              <div class="row">
             @yield('contenido')
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                      document.write(new Date().getFullYear());
                  </script>
                  | SOFTWARE DISEÑADO POR K.J.S TECHNOLOGY S.A
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

 
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <!--
      {{ asset('assets/vendor/js/menu.js') }}
    -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
