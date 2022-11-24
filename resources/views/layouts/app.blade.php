<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="navbar">
                <a class="navbar-brand" href="{{ url('home') }}">
                     <img src="/img/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @elseif(Auth::user()->user_type === 'user')
                            <li class="nav-item"><a href="#" class="nav-link">{{ __('My Events') }}</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/user_photos/{{Auth::user()->photo}}" style="width:50px; height:25px; border-radius:50%;">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                             @elseif(Auth::user()->user_type === 'admin')
                            <li class="nav-item"><a href="{{route('admin')}}" class="nav-link">{{ __('Admin') }}</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/user_photos/{{Auth::user()->photo}}" style="width:50px; height:35px; border-radius:50%;">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fa-solid fa-user"></i> {{ __('Profile') }}
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

  <!-- Container START -->
  <div class="container">
    <div class="row">
<!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<div class="d-flex align-items-center mb-4 d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<i class="fa-solid fa-sliders"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">Sliders</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
              <!-- Card START -->
              <div class="card w-100">
                <!-- Card body START -->
                <div class="card-body" id="sidebar">

                <!-- Side Nav START -->
                <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route('admin')}}"> <i class="fa-solid fa-minimize"></i> <span>Dashboard</span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('events')}}"><i class="fa-solid fa-calendar-plus"></i> <span>Events </span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('users')}}"><i class="fa-solid fa-user"></i> <span>Users </span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('reports')}}"><i class="fa-solid fa-clipboard"></i> <span>Reports </span></a>
                  </li>
                </ul>
                <!-- Side Nav END -->
              </div>
              <!-- Card body END -->
              </div>
            <!-- Card END -->
            </div>
            <!-- Offcanvas body -->
            <!-- Copyright -->
            <p class="small text-center mt-1">©2022 HDC Events </p>
          </div>
        </nav>
      </div>
      <!-- Sidenav END -->


      <!-- start: Content -->
        <div class="py-2 col-lg-9">
            @yield('content')
        </main>
                </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->
    </div>

        <footer>
            <p>HDC Events &copy; 2022</p>
        </footer>

    <script>
        $(document).ready(function () {
        $('#datatables').DataTable();
        //console.log('hello world!');
        });
    </script>


</body>
</html>
