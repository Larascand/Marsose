<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
  <!-- Begin::Wrapper -->
  <div id="kt_app_sidebar_wrapper" class="app-sidebar-wrapper hover-scroll-y my-5 my-lg-2" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_sidebar_wrapper" data-kt-scroll-offset="5px">
      <!-- Begin::Sidebar menu -->
      <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-6 mb-5">
          <!-- Begin: Menu item -->
          <div class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <a class="menu-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}" href="{{ url('/') }}">
                  <span class="menu-icon">
                    @if($activeMenu == 'dashboard')
                        <img alt="Logo" src="assets/media/logos/menu-active/logo-{{ $activeMenu }}.svg" class="h-25px theme-light-show" />
                    @else
                        <img alt="Logo" src="assets/media/logos/menu/logo-{{ $activeMenu }}.svg" class="h-25px theme-light-show" />
                    @endif
                    </span>
                  <span class="menu-title">Dashboard</span>
              </a>
              <!-- End: Menu link -->
          </div>
          <!-- End: Menu item -->

          <!-- Begin: Menu item -->
          <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <span class="menu-link">
                  <span class="menu-icon">
                      <img alt="Logo" src="assets/media/logos/logo-laporan.svg" class="h-25px theme-light-show" />
                  </span>
                  <span class="menu-title">Laporan</span>
                  <span class="menu-arrow"></span>
              </span>
              <!-- End: Menu link -->

              <!-- Begin: Menu sub -->
              <div class="menu-sub menu-sub-accordion">
                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 1</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 2</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 3</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 4</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 5</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->
              </div>
              <!-- End: Menu sub -->
          </div>
          <!-- End: Menu item -->

          <!-- Begin: Menu item -->
          <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <span class="menu-link">
                  <span class="menu-icon">
                      <img alt="Logo" src="assets/media/logos/logo-penduduk.svg" class="h-25px theme-light-show" />
                  </span>
                  <span class="menu-title">Data Penduduk</span>
                  <span class="menu-arrow"></span>
              </span>
              <!-- End: Menu link -->

              <!-- Begin: Menu sub -->
              <div class="menu-sub menu-sub-accordion">
                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 1</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 2</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 3</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 4</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->

                  <!-- Begin: Menu item -->
                  <div class="menu-item">
                      <!-- Begin: Menu link -->
                      <a class="menu-link" href="../../demo39/dist/index.html">
                          <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">RT 5</span>
                      </a>
                      <!-- End: Menu link -->
                  </div>
                  <!-- End: Menu item -->
              </div>
              <!-- End: Menu sub -->
          </div>
          <!-- End: Menu item -->

          <!-- Begin: Menu item -->
          <div class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <a class="menu-link {{ ($activeMenu == 'datart') ? 'active' : '' }}" href="{{ url('/rt') }}">
                  <span class="menu-icon">
                    @if($activeMenu == 'datart')
                        <img alt="Logo" src="assets/media/logos/menu-active/logo-{{ $activeMenu }}.svg" class="h-25px theme-light-show" />
                    @else
                        <img alt="Logo" src="assets/media/logos/menu/logo-{{ $activeMenu }}.svg" class="h-25px theme-light-show" />
                    @endif
                    </span>
                  <span class="menu-title">Data RT</span>
              </a>
              <!-- End: Menu link -->
          </div>
          <!-- End: Menu item -->

          <!-- Begin: Menu item -->
          <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <a class="menu-link" href="../">
                  <span class="menu-icon">
                      <img alt="Logo" src="assets/media/logos/logo-surat.svg" class="h-25px theme-light-show" />
                  </span>
                  <span class="menu-title">Surat-Surat</span>
              </a>
              <!-- End: Menu link -->
          </div>
          <!-- End: Menu item -->

          <!-- Begin: Menu item -->
          <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
              <!-- Begin: Menu link -->
              <a class="menu-link" href="../">
                  <span class="menu-icon">
                      <img alt="Logo" src="assets/media/logos/logo-spk.svg" class="h-25px theme-light-show" />
                  </span>
                  <span class="menu-title">Laporan SPK</span>
              </a>
              <!-- End: Menu link -->
          </div>
          <!-- End: Menu item -->
      </div>
      <!-- End::Sidebar menu -->
  </div>
  <!-- End::Wrapper -->
</div>

