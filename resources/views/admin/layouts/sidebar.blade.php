  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                  <a href="#" class="d-block">Admin</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                  {{-- <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item {{ in_array($type_menu, ['class-create']) ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ in_array($type_menu, ['class-create']) ? 'active' : '' }}">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Forms
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.kelas.create') }}"
                                  class="nav-link {{ $type_menu === 'class-create' ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Buat Kelas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="../forms/buat_materi.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Buat Materi</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="../forms/buat_quiz.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Buat Quiz</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item {{ $type_menu === 'class-list' ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link {{ $type_menu === 'class-list' ? 'active' : '' }}">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Data
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="../tables/data_user.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data User</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.kelas.index') }}"
                                  class="nav-link  {{ Request::routeIs('admin.kelas.index') ? 'active' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Data Kelas</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="../calendar.html" class="nav-link">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Calendar
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                  </li> --}}
                  {{-- MENU DASHBOARD --}}
                  <x-sidebar.menu-item href="{{ route('admin.dashboard') }}" title="Dashboard"
                      icon="fas fa-tachometer-alt" :active="$type_menu === 'dashboard'" />


                  {{-- MENU FORM --}}
                  <x-sidebar.tree-menu title="Forms" icon="fas fa-edit" :menuKeys="['class-create', 'material-create', 'quiz-create']" :activeMenu="$type_menu">
                      <x-sidebar.menu-item href="{{ route('admin.kelas.create') }}" title="Buat Kelas"
                          icon="far fa-circle nav-icon" :active="$type_menu === 'class-create'" />
                      <x-sidebar.menu-item href="{{ route('admin.class-option', 'materi') }}" title="Buat Materi"
                          icon="far fa-circle nav-icon" :active="$type_menu === 'material-create'" />
                      <x-sidebar.menu-item href="{{ route('admin.class-option', 'quiz') }}" title="Buat Quiz"
                          icon="far fa-circle nav-icon" :active="$type_menu === 'quiz-create'" />
                  </x-sidebar.tree-menu>

                  {{-- MENU DATA --}}
                  <x-sidebar.tree-menu title="Data" icon="fas fa-table" :menuKeys="['class-list', 'user-list']" :activeMenu="$type_menu">
                      <x-sidebar.menu-item href="{{ route('admin.user.index') }}" title="Data User"
                          icon="far fa-circle nav-icon" :active="$type_menu === 'user-list'" />
                      <x-sidebar.menu-item href="{{ route('admin.kelas.index') }}" title="Data Kelas"
                          icon="far fa-circle nav-icon" :active="$type_menu === 'class-list'" />
                  </x-sidebar.tree-menu>



          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
