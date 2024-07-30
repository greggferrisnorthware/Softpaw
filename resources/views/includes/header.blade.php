<div id="app">
    <header>
    <div class="relative">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid relative fluid-pad">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="logo-info">
                    {{ config('app.name', 'Softpaw') }}
                    <small>Pet Supplies Plus</small>
                </span>
                <img class="header-logo" src="/images/logo-footer.png" alt="softpaw footer logo" title="softpaw footer logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="navbar-nav ms-auto search relative">
                    <div class="searches">
                        <input type="text" id="everything" class="form-control" placeholder="Search Site" name="everything" value="" />
                        <div id="clicked" class="form-control">Clear</div>
                    </div>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{-- @if (Route::has('home')) --}}
                            <li class="nav-item">
                                <a class="nav-link" href="/">{{ __('Home') }}</a>
                            </li>
                        {{-- @endif --}}

                        {{-- @if (Route::has('blog')) --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog') }}">{{ __('Blog') }}</a>
                            </li>
                        {{-- @endif --}}
                        
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/">{{ __('Home') }}</a>
                                <a class="dropdown-item" href="{{ route('blog') }}">{{ __('Blog') }}</a>
                                <a class="dropdown-item" href="{{ route('view-everything') }}">{{ __('Hub') }}</a>
                                <a class="dropdown-item" href="{{ route('add-affiliates') }}">{{ __('Add Product') }}</a>
                                {{-- <a class="dropdown-item" href="{{ rou'add-brands') }}">{{ __('Add Brand') }}</a> --}}
                                {{-- <a class="dropdown-item" href="{{ route('add-categories') }}">{{ __('Add Category') }}</a> --}}
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="nav-navbar-break"></div>

    <div class="view-all-everything">
        <div class="row">
            <div class="col-md-12"> 
                <div id="feedbackEverything"></div>
            </div>
        </div>
    </div>

    </div>
    </header>