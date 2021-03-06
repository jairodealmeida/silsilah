<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
           
            <a class="navbar-brand" href="{{ url('/') }}">
                <ul class="nav navbar-nav">
                <img src="images/logo.jpeg" style = "width:30px;heigth:auto" alt="">
                {{ config('app.name', 'Laravel') }}
                </ul>
            </a>
           
            
        </div>
        <!--div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
              
            </ul>
        </div-->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            
            <!--ul class="nav navbar-nav">
                @if (Auth::user())
                <li><a href="{{ route('races.index') }}">{{ __('app.races') }}</a></li>
                <li><a href="{{ route('animals.index') }}">{{ __('app.pets') }}</a></li>
                <li><a href="{{ route('offices.index') }}">{{ __('app.offices') }}</a></li>
                <li><a href="{{ route('users.search') }}">{{ __('app.search_your_family') }}</a></li>
                <li><a href="{{ route('birthdays.index') }}">{{ __('birthday.birthday') }}</a></li>
                @endif    
            </ul-->
            
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?';?>
                <!--li><a href="{{ url(url()->current() . $mark . 'lang=en') }}">Inglês</a></li>
                <li><a href="{{ url(url()->current() . $mark . 'lang=id') }}">Português</a></li-->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                    <!--li><a href="{{ route('register') }}">{{ __('auth.register') }}</a></li-->
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if (is_system_admin(auth()->user()))
                                <!--li><a href="{{ route('backups.index') }}">{{ __('backup.list') }}</a></li-->
                                
                                <li><a href="{{ route('species.index') }}">{{ __('app.species') }}</a></li>
                                <li><a href="{{ route('races.index') }}">{{ __('app.races') }}</a></li>
                                <li><a href="{{ route('offices.index') }}">{{ __('app.offices') }}</a></li>
                                <li><a href="{{ route('creators.index') }}">{{ __('app.creators') }}</a></li>
                                <li><a href="{{ route('proprietaries.index') }}">{{ __('app.proprietaries') }}</a></li>
                                <li role="separator" class="divider"></li>
                            @endif
                            
                            @if (Auth::user())
                                <li><a href="{{ route('animals.index') }}">{{ __('app.pets') }}</a></li>
                                <li><a href="{{ route('users.search') }}">{{ __('app.search_your_family') }}</a></li>
                                <li><a href="{{ route('birthdays.index') }}">{{ __('birthday.birthday') }}</a></li>
                                <li role="separator" class="divider"></li>
                            @endif  

                            <!--li><a href="{{ route('profile') }}">{{ __('app.my_profile') }}</a></li-->
                            <li><a href="{{ route('password.change') }}">{{ __('auth.change_password') }}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('auth.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>