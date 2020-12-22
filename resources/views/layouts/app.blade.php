<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> {{Auth::user()->role == 'doctor' ? 'Doctor' : '' }}
        {{Auth::user()->role == 'patient' ? 'Patient' : ''}}
        {{Auth::user()->role == 'Super Admin' ? 'Admin' : ''}} || @isset($pageTitle) {{$pageTitle}}@endisset</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets') }}/img/favicon.ico' />
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/bundles/select2/dist/css/select2.min.css">

    {{-- <script src="{{ asset('assets') }}/bundles/datatables/datatables.min.css"></script> --}}
    <link rel="stylesheet"
        href="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    @stack('css')

</head>

<body class="{{Helper::layouts()}}">
    <div id="app">
        {{-- <div class="loader"></div> --}}
        <button class="btn-progress" hidden></button> <!-- heddin loding btn  -->
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.parts.navbar')
            <div class="main-sidebar sidebar-style-2">
                @include('layouts.parts.sidebar')
                </ul>
                </aside>
            </div>
            <!-- Main Content -->

            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.parts.footer')
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action=" {{ url('treatment/save') }} " method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('treatment') ? 'has-error' : ''}}">
                            <label for="treatment" class="control-label">{{ __('treatment') }}</label>
                            <input class="form-control" name="treatment" type="text" id="treatment" min="0"
                                value="{{ isset($treatmentinformation->treatment) ? $treatmentinformation->treatment : old('treatment')}}"
                                required>
                            {!! $errors->first('treatment', '<p class="text-danger">:message</p>') !!}
                            <div class="invalid-feedback"> What's your treatment?</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- General JS Scripts -->
    <script src="{{ asset('assets') }}/js/app.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets') }}/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    <script src="{{ asset('assets') }}/bundles/izitoast/js/iziToast.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/datatables/datatables.min.js"></script>
    <script src="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>


    <script>
        //delete sweet alert
        function sweetalertDelete(id) {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "To continue this action!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Your action has beed done! :)", {
                            icon: "success",
                            buttons: false,
                            timer: 1000
                        });
                        $("#deleteButton" + id).submit();
                    }
                });
        }
        // multiple click privent
        $('.oneTimeSubmit').click(function () {
            var count1 = 0;
            var count2 = -1;

            const inputs = document.querySelectorAll('#oneTimeSubmit input');
            const requiredFields = Array.from(inputs).filter(input => input.required);
            for (let index = 0; index < requiredFields.length; index++) {
                count1 = index;

                if (requiredFields[index].value) {
                    count2++;
                }
            }
            if (count1 == count2) {
                $('.oneTimeSubmit').addClass('btn-progress');
            }

        });
        //for validation
        $('input, textarea, select').keyup(function (e) {
            $(this).closest('form').addClass("was-validated");
        });
        // tostr message
        @if(Session::has('success'))
        iziToast.success({
            // title: 'Hello, world!',
            message: '{{ Session::get('success') }}',
            position: 'topRight'
        });
        @endif
        @if(Session::has('warning'))
        iziToast.warning({
            // title: 'Hello, world!',
            message: '{{ Session::get('warning') }}',
            position: 'topRight'
        });
        @endif
        @if(Session::has('error'))
        iziToast.error({
            message: '{{ Session::get('error') }}',
            position: 'topRight'
        });
        @endif
        //sidebar css setting
        @if(Helper::sidebar())
        jQuery("body").addClass("{{Helper::sidebar()}}");
        @endif

        $('#table').DataTable({
            "scrollX": true,
            stateSave: true
        });

    </script>
    @stack('js')
</body>

</html>
