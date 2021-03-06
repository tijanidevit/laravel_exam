<div
      id="aside"
      class="page-sidenav no-shrink bg-light nav-dropdown fade"
      aria-hidden="true"
    >
      <div class="sidenav h-100 modal-dialog bg-light">
        <!-- sidenav top -->
        <div class="navbar">
          <!-- brand -->
          <a href="./" class="navbar-brand">
            <!-- <img src="assets/img/logo.png" alt="..."> -->
            <span class="hidden-folded d-inline l-s-n-1x">Exam Test</span> </a
          ><!-- / brand -->
        </div>
        <!-- Flex nav content -->
        <div class="flex scrollable hover">
          <div class="nav-active-text-primary" data-nav>
            <ul class="nav bg">
              <li class="nav-header hidden-folded">
                <span class="text-muted">Main</span>
              </li>
              <li>
                <a href="{{route('dashboard')}}"
                  ><span class="nav-icon text-primary"
                    ><i data-feather="home"></i
                  ></span>
                  <span class="nav-text">Dashboard</span></a
                >
              </li>
            </ul>
            <ul class="nav">
              <li class="nav-header hidden-folded">
                <span class="text-muted">Functional Areas</span>
              </li>
              <li>
                <a href="#" class=""
                  ><span class="nav-icon"><i data-feather="grid"></i></span>
                  <span class="nav-text">Exams</span>
                  <span class="nav-caret"></span
                ></a>
                <ul class="nav-sub nav-mega">
                  <li>
                    <a href="{{route('exams.create')}}" class=""
                      ><span class="nav-text">Add a new Exam</span></a
                    >
                  </li>
                  <li>
                    <a href="{{route('exams.index')}}" class=""
                      ><span class="nav-text">View all Exams</span></a
                    >
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>