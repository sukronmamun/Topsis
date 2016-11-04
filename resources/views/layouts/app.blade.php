<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SPK') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="/js/Chart.bundle.js"></script>
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse" >
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/alternative') }}">
            {{ config('app.name', 'SPK') }}
          </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav nav-hidden">
             <li><a href="{{ url('/home') }}">Beranda</a></li>
             
             <li><a href="{{ url('/kriteria') }}">Kriteria Dan Bobot</a></li>
             <li><a href="{{ url('/alternative') }}">Alternative</a></li>
             <li><a href="{{ url('/matrix') }}">Matrix</a></li>
             
             <li><a href="{{ url('/perhitungan') }}">Analisa</a></li>                
          </ul>
          <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            @if (Auth::guest())
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
              </ul>
            @endif
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-3 col-md-2 sidebar">
          <div class="panel-profile">
            <img src="/images/{{ Auth::user()->avatar }}" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>{{ Auth::user()->name }}</h4>
            <span class="text-muted">{{ Auth::user()->email }}</span>
            <br>
            
           <div class="icon-master">
              <a href="{{ url('/profile') }}" class="sub-icon" >Profile</a>
              <a href="{{ url('/logout') }}"  class="sub-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
           </div>

          </div>

          <div class="hrader-color menu-sidebar">
                  <a class="" href="{{ url('/home') }}">Beranda</a>
          </div>
          <div class="panel-group sidebar-hidden" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel  hrader-color custom-panel">
              {{-- <div class="custom-panel"> --}}
                <div class="panel-heading " role="tab" id="headingOne">
                  <h4 class="panel-title ">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Data Master
                  </a>
                  </h4>
                {{-- </div> --}}
              </div>
              <div id="collapseOne" class="panel-collapse collaps in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body list-group">
                  <a class="list-group-item" href="{{ url('/kriteria') }}">Kriteria Dan Bobot</a>
                  <a class="list-group-item" href="{{ url('/alternative') }}">Alternative</a>
                  <a class="list-group-item" href="{{ url('/matrix') }}">Matrix</a>
                  
                </div>
              </div>
            </div>
            <div class="panel  hrader-color reset_margin line">
              <div class="panel-heading " role="tab" id="headingTwo">
                <h4 class="panel-title ">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Analisa Data 
                </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collaps in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body list-group">
                  <a class="list-group-item" href="{{ url('/perhitungan') }}">Analisa</a>
                </div>
              </div>
            </div>
         
          </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
          
        </div>
      </div>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
    <script>
    /*  $('.nav-hidden').hide();
      $('.navbar-toggle').on("click",function(){
      
      $('.nav-hidden').toggle(function(){
      $('.nav-hidden').show();

      });

      });*/

      $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

  </body>
</html>