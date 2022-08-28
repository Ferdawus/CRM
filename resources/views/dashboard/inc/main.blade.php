<!DOCTYPE html>
<html lang="en">
  <head>
    @yield('title')
    @include('dashboard.inc.header')
  </head>

  <body>
    <!-- Loader starts-->
      {{-- <div class="loader-wrapper">
        <div class="theme-loader">    
          <div class="loader-p"></div>
        </div>
      </div> --}}
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

      <!-- Page Header Start-->
      @include('dashboard.inc.navigator')

        @yield('content')
        
        <!-- footer start-->
      @include('dashboard.inc.footer')

    </div>    
  </body>
</html>