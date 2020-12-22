<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="{{ url('/') }}" title=""></a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <div id="support-info" style="    float: left;">
                    <b>Support <br><a href="tel://0775566168">0775566168</a>/<a
                            href="tel://0777148715">0777148715</a></b>
                </div>
                <div class="main-menu">
                    <ul>
                        <li class="submenu">
                            <a href="{{ url('/') }}" class="show-submenu {{Request::is('/') ? 'active' : ''}}">Home</a>

                        </li>
                        <li class="submenu">
                            <a href="{{url('/doctor/list')}}"
                                class="show-submenu {{Request::is('doctor/list') ? 'active' : ''}}">Doctor List</a>
                        </li>
                        <li class="submenu">
                            <a href="{{url('/about-us')}}"
                                class="show-submenu {{Request::is('about-us') ? 'active' : ''}}">About Us</a>
                        </li>
                        <li class="submenu">
                            <a href="#0"
                                class="show-submenu {{Request::is('doctor/signin') ? 'active' : ''}} {{Request::is('doctor/signup') ? 'active' : ''}}">Doctor<i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="{{ url('doctor/signin') }}">Login</a></li>
                                <li><a href="{{ url('doctor/signup') }}">Register</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#0"
                                class="show-submenu {{Request::is('patient/signin') ? 'active' : ''}} {{Request::is('patient/signup') ? 'active' : ''}}">Patient<i
                                    class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="{{ url('patient/signin') }}">Login</a></li>
                                <li><a href="{{ url('patient/signup') }}">Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>


