<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}">
            {{-- <img alt="image" src="{{ asset('assets') }}/img/logo.png"
            class="header-logo" /> --}}
            <span class="logo-name">
                {{Auth::user()->role == 'doctor' ? 'Doctor' : '' }}
                {{Auth::user()->role == 'patient' ? 'Patient' : ''}}
                {{Auth::user()->role == 'Super Admin' ? 'Admin' : ''}}
            </span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::is('dashboard') ? 'active':''}}">
            <a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        @if (Auth::user()->role == 'Super Admin')
        <li class="menu-header">Setting</li>
        <li class="dropdown {{ Request::is('admin/user*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>User
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/user/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user/create') }}">New User</a></li>
                <li class="{{ Request::is('admin/user') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user') }}">User List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/role*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Role
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/role/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role/create') }}">New Role</a></li>
                <li class="{{ Request::is('admin/role') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role') }}">Role List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/activities*') ? 'active':''}}">
            <a href="{{ url('admin/activities') }}" class="nav-link"><i data-feather="activity"></i><span>Activities
                </span></a>
        </li>
        <li class="dropdown {{ Request::is('admin/email*') ? 'active':''}}">
            <a href="{{ url('admin/email/send') }}" class="nav-link"><i data-feather="mail"></i><span>Email
                    Management</span></a>
        </li>
        @endif

        @if(Helper::authCheck("slider-show") || Helper::authCheck("slider-create")) <li
            class="dropdown {{ Request::is("admin/slider*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Slider </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("slider-create"))<li
                    class="{{ Request::is("admin/slider/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/slider/create") }}">New Slider</a></li> @endif
                @if(Helper::authCheck("slider-show")) <li class="{{ Request::is("admin/slider") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/slider") }}">Slider List</a></li> @endif </ul>
        </li> @endif
        @if(Helper::authCheck("page-show") || Helper::authCheck("page-create")) <li
            class="dropdown {{ Request::is("admin/page*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Page </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("page-create"))
                @if(Helper::authCheck("page-show")) <li class="{{ Request::is("admin/page/about-us") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/page/about-us/edit") }}">About us</a></li> @endif
                @if(Helper::authCheck("page-show")) <li class="{{ Request::is("admin/page/faq") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/page/faq/edit") }}">FQA</a></li> @endif
                @if(Helper::authCheck("page-show")) <li
                    class="{{ Request::is("admin/page/terms-and-conditions") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/page/terms-and-conditions/edit") }}">Terms and conditions</a></li> @endif
                @if(Helper::authCheck("page-show")) <li
                    class="{{ Request::is("admin/page/privacy-policy") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/page/privacy-policy/edit") }}">Privacy policy</a></li> @endif
                @if(Helper::authCheck("page-show")) <li
                    class="{{ Request::is("admin/page/informed-consent") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/page/informed-consent/edit") }}">Informed consent</a></li> @endif
                @endif </ul>
        </li> @endif
        @if(Helper::authCheck("testimonial-show") || Helper::authCheck("testimonial-create")) <li
            class="dropdown {{ Request::is("admin/testimonials*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Testimonials </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("testimonial-create"))<li
                    class="{{ Request::is("admin/testimonials/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/testimonials/create") }}">New Testimonials</a></li> @endif
                @if(Helper::authCheck("testimonial-show")) <li
                    class="{{ Request::is("admin/testimonials") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/testimonials") }}">Testimonials List</a></li> @endif </ul>
        </li> @endif
        @if(Auth::user()->role == 'Super Admin') <li class="{{ Request::is("admin/booking-fee/1/edit") ? "active":""}}">
            <a class="nav-link" href="{{ url("admin/booking-fee/1/edit") }}">Set booking fee</a></li> @endif
        @if (Auth::user()->role == 'doctor' || Auth::user()->role == 'patient')
        <li class="menu-header">Profile</li>
        @else
        <li class="menu-header">Others</li>
        @endif
        @if (Auth::user()->role == 'doctor')
        <li class="{{ Request::is("admin/doctor*") ? "active":""}}"><a class="nav-link"
                href="{{ url("/admin/doctor/".Auth::user()->doctor->id ) }}"><i data-feather="copy"></i> <span>Doctor
                    Profile</span> </a></li></a>

        @endif

        @if (Auth::user()->role == 'patient')
        <li class="{{ Request::is("admin/patient*") ? "active":""}}"><a class="nav-link"
                href="{{ url("/admin/patient/".Auth::user()->patient->id ) }}"><i data-feather="copy"></i> <span>Patient
                    Profile
                    details
                </span></a></li></a>

        @endif

        @if(Helper::authCheck("xray-show") || Helper::authCheck("xray-create")) <li
            class="dropdown {{ Request::is("admin/x-ray*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>X Ray </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("xray-create"))<li
                    class="{{ Request::is("admin/x-ray/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/x-ray/create") }}">New X Ray</a></li> @endif
                @if(Helper::authCheck("xray-show")) <li class="{{ Request::is("admin/x-ray") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/x-ray") }}">X Ray List</a></li> @endif </ul>
        </li> @endif

        @if(Helper::authCheck("medication-show") || Helper::authCheck("medication-create")) <li
            class="dropdown {{ Request::is("admin/medication*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Medication </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("medication-create"))<li
                    class="{{ Request::is("admin/medication/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/medication/create") }}">New Medication</a></li> @endif
                @if(Helper::authCheck("medication-show")) <li
                    class="{{ Request::is("admin/medication") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/medication") }}">Medication List</a></li> @endif </ul>
        </li> @endif

        @if(Helper::authCheck("labreport-show") || Helper::authCheck("labreport-create")) <li
            class="dropdown {{ Request::is("admin/lab-report*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Lab Report </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("labreport-create"))<li
                    class="{{ Request::is("admin/lab-report/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/lab-report/create") }}">New Lab Report</a></li> @endif
                @if(Helper::authCheck("labreport-show")) <li class="{{ Request::is("admin/lab-report") ? "active":""}}">
                    <a class="nav-link" href="{{ url("admin/lab-report") }}">Lab Report List</a></li> @endif </ul>
        </li> @endif

        @if(Helper::authCheck("chat-show") || Helper::authCheck("chat-create")) <li
            class="dropdown {{ Request::is("admin/chat*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Chat </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("chat-create"))<li
                    class="{{ Request::is("admin/chat/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/chat/create") }}">Compose</a></li> @endif
                @if(Helper::authCheck("chat-show")) <li class="{{ Request::is("admin/chat/inbox") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/chat/inbox") }}">Inbox</a></li> @endif
                @if(Helper::authCheck("chat-show")) <li class="{{ Request::is("admin/chat") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/chat") }}">Send Message</a></li> @endif
            </ul>
        </li> @endif

        @if (Auth::user()->role == 'patient')<li class="{{ Request::is("admin/account/create*") ? "active":""}}"><a
                class="nav-link" href="{{ url("admin/account/".Auth::user()->patient->account->id.'/edit') }}"><i
                    data-feather="copy"></i> Account
                Details</a></li>
        @endif

        @if (Auth::user()->role == 'doctor')<li class="{{ Request::is("admin/account/create*") ? "active":""}}"><a
                class="nav-link" href="{{ url("admin/account/".Auth::user()->doctor->account->id.'/edit') }}"><i
                    data-feather="copy"></i> Account
                Details</a></li>
        @endif

        <li class="{{ Request::is("admin/invoices/booking*") ? "active":""}}"><a class="nav-link"
                href="{{ url("admin/invoices/booking") }}"><i data-feather="copy"></i> Booking Invoice </a></li>
        <li class="{{ Request::is("admin/invoices/treatment*") ? "active":""}}"><a class="nav-link"
                href="{{ url("admin/invoices/treatment") }}"><i data-feather="copy"></i> Treatment Invoice </a></li>
        <li {{Auth::user()->role == 'Super Admin' ? 'hidden' :''}}
            class="{{ Request::is("admin/calendar*") ? "active":""}}">
            <a class="nav-link" href="{{ url("admin/calendar") }}"><i data-feather="copy"></i> Calendar </a></li>

        <li class="menu-header">Function</li>

        @if(Helper::authCheck("patient-show") || Helper::authCheck("patient-create"))
        <li class="dropdown {{ Request::is("admin/patient*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Patient </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("patient-create"))<li
                    class="{{ Request::is("admin/patient/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/patient/create") }}">New Patient</a></li> @endif
                @if(Helper::authCheck("patient-show")) <li class="{{ Request::is("admin/patient") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/patient") }}">Patient Details</a></li> @endif </ul>
        </li>
        @endif
        @if(Helper::authCheck("doctor-show") || Helper::authCheck("doctor-create"))
        <li class="dropdown {{ Request::is("admin/doctor*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Doctor </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("doctor-create"))<li
                    class="{{ Request::is("admin/doctor/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/doctor/create") }}">New Doctor</a></li> @endif
                @if(Helper::authCheck("doctor-show")) <li class="{{ Request::is("admin/doctor") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/doctor") }}">Doctor List</a></li> @endif </ul>
        </li>

        @endif

        @if(Helper::authCheck("booking-show") || Helper::authCheck("booking-create")) <li
            class="dropdown {{ Request::is("admin/booking*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Booking </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("booking-create"))<li
                    class="{{ Request::is("admin/booking/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/booking/create") }}">New Booking</a></li> @endif
                @if(Helper::authCheck("booking-show")) <li
                    class="{{ Request::is("admin/booking/upcoming") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/booking/upcoming") }}">Upcoming Booking</a></li>
                <li class="{{ Request::is("admin/booking") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/booking") }}">Previous Booking</a></li> @endif
            </ul>
        </li> @endif

        @if(Helper::authCheck("treatmentinformation-show") || Helper::authCheck("treatmentinformation-create")) <li
            class="dropdown {{ Request::is("admin/treatment-information*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Treatment Information
                </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("treatmentinformation-create"))<li
                    class="{{ Request::is("admin/treatment-information/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/treatment-information/create") }}">New Treatment Information</a></li> @endif
                @if(Helper::authCheck("treatmentinformation-show")) <li
                    class="{{ Request::is("admin/treatment-information") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/treatment-information") }}">Treatment Information List</a></li> @endif </ul>
        </li> @endif

        {{-- @if(Helper::authCheck("account-show") || Helper::authCheck("account-create")) <li
            class="dropdown {{ Request::is("admin/account*") ? "active":""}}"> <a href="#"
            class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Account </span></a>
        <ul class="dropdown-menu">
            @if(Helper::authCheck("account-show")) <li class="{{ Request::is("admin/account") ? "active":""}}"><a
                    class="nav-link" href="{{ url("admin/account") }}">Account List</a></li> @endif </ul>
        </li> @endif --}}

        @if(Helper::authCheck("prescription-show") || Helper::authCheck("prescription-create")) <li
            class="dropdown {{ Request::is("admin/prescription*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Prescription </span></a>
            <ul class="dropdown-menu">
                @if(Helper::authCheck("prescription-show")) <li
                    class="{{ Request::is("admin/prescription") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/prescription") }}">Prescription List</a></li> @endif </ul>
        </li> @endif

        @if(Helper::authCheck("doctoravailable-show") || Helper::authCheck("doctoravailable-create")) <li
            class="dropdown {{ Request::is("admin/doctor-available*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Availability </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("doctoravailable-create"))<li
                    class="{{ Request::is("admin/doctor-available/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/doctor-available/create") }}">Add timeslots</a></li> @endif
                @if(Helper::authCheck("doctoravailable-show")) <li
                    class="{{ Request::is("admin/doctor-available") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/doctor-available") }}">Availability List</a></li> @endif </ul>
        </li> @endif
        @if(Auth::user()->role=='Super Admin') <li class="dropdown {{ Request::is("admin/contact*") ? "active":""}}"> <a
                href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Contact </span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is("admin/contact") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/contact") }}">Contact List</a></li>
            </ul>
        </li> @endif

        @if(Helper::authCheck("blog-show") || Helper::authCheck("blog-create")) <li
            class="dropdown {{ Request::is("admin/blog*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Blog </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("blog-create"))<li
                    class="{{ Request::is("admin/blog/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/blog/create") }}">New Blog</a></li> @endif
                @if(Helper::authCheck("blog-show")) <li class="{{ Request::is("admin/blog") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/blog") }}">Blog List</a></li> @endif </ul>
        </li> @endif
