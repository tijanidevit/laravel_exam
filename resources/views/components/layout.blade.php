<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Muideen Aliu Admin Dashboard" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}" />
  </head>
  <body class="layout-row">
    <!-- ############ Aside START-->
    @include('components.sidebar')
    <!-- ############ Aside END-->
    <div id="main" class="layout-column flex">
      <!-- ############ Header START-->
      @include('components.header')
      <!-- ############ Footer END--><!-- ############ Content START-->
      <div id="content" class="flex">
        <!-- ############ Main START-->
        <div>
          <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
              <div class="page-title">
                <h2 class="text-md text-highlight">@yield('page_title')</h2>
                <small class="text-muted">Hello Admin. Welcome to your dashboard</small>
              </div>
              <div class="flex"></div>
              {{-- <div>
                <a
                  href="exams/new"
                  class="btn btn-md text-muted"
                  ><span class="d-none d-sm-inline mx-1">Add new exam</span>
                  <i data-feather="arrow-right"></i
                ></a>
              </div> --}}
            </div>
          </div>
          <div class="page-content page-container" id="page-content">
            <div class="padding sr">
             @yield('content')
            </div>
          </div>
        </div>
        <!-- ############ Main END-->
      </div>
      <!-- ############ Content END--><!-- ############ Footer START-->
       @include('components.footer')
      <!-- ############ Footer END-->
    </div>
    <script src="{{asset('assets/js/site.min.js')}}"></script>
    @yield('ajax')
  </body>
</html>