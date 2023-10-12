<div class="wrapper">

  <nav class="col-xl-2 col-md-3 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column list-unstyled components mt-1">
        <li class="nav-item {{ $page == 'home' ? 'active' : '' }}">
          <a class="nav-link" href="/">
            <i class="fa fa-tachometer px-2"></i>
            <span>Dashboard</span>
          </a>
          <hr class="sidebar-divider my-0">
        </li>
        <li class="nav-item">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fa fa-graduation-cap px-2"></i>
            <span>ข้อมูลอาจารย์ที่ปรึกษา</span>
          </a>
          <ul class="collapse {{ $page == 'adviser' | $page == 'adviser_new' ? 'show' : '' }} list-unstyled" id="homeSubmenu">
            <li class="nav-item">
              <a class="nav-link {{ $page == 'adviser' ? 'active' : '' }} sub-menu" href="/advisers">
                <small>
                  <i class="fa fa-address-card px-2"></i>
                  <span>รายชื่ออาจารย์ที่ปรึกษา</span>
                </small>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $page == 'adviser_new' ? 'active' : '' }} sub-menu" href="/advisers/create">
                <small>
                  <i class="fa fa-plus-square px-2"></i>
                  <span>สร้างอาจารย์ที่ปรึกษาใหม่</span>
                </small>
              </a>
            </li>
          </ul>
          <hr class="sidebar-divider my-0">
        </li>
        <li class="nav-item {{ $page == 'student' ? 'active' : '' }}">
          <a class="nav-link" href="/students">
            <i class="fa fa-users px-2"></i>
            ข้อมูลนักศึกษา
          </a>
          <hr class="sidebar-divider my-0">
        </li>
      </ul>
    </div>
  </nav>

</div>
