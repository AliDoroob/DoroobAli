 <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title"><h4>لوحة التحكم</h4></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title"><h4>الأقسام</h4></span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.sections.index')}}"><h6><b> أسماء الأقسام</b></h6> </a></li>
              </ul>
            </div>
          </li>
          @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 5)
                    <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-fasic" aria-expanded="false" aria-controls="form-elements">
                  <i class="menu-icon fas fa-newspaper"></i>
                  <span class="menu-title"><h4>الأخبار</h4></span>
                  <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-fasic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.news_public.index')}}"><h6><b> الأخبار</b></h6> </a></li>
                  </ul>
              </div>
          </li>
      @endif
      @if(Auth::user()->role_id == 2 )
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-bsasic" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon fas fa-cogs"></i>
              <span class="menu-title"><h4>الصلاحيات</h4></span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-bsasic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.index')}}"><h6><b> الصلاحيات </b></h6> </a></li>
              </ul>
          </div>
      </li>
      @endif
      @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 9)
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-baasic" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon fas fa-wrench"></i> <!-- Change the icon class here -->
              <span class="menu-title"><h4>الأعمال</h4></span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-baasic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.business_public.index')}}"><h6><b> معرض الأعمال</b></h6> </a></li>
              </ul>
          </div>
      </li>
      @endif
          {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon fas fa-handshake"></i>
                <span class="menu-title"><h4>الشركاء</h4></span>
                <i class="menu-arrow"></i>
            </a>
        </li>         --}}
          {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title"><h4>المشاريع</h4></span>
              <i class="menu-arrow"></i>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">المشاريع</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li> --}}
      </nav>