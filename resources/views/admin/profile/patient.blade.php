@extends('layouts.app',['pageTitle' => __('Patient Profile')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __('Patient Profile') }}
@endslot
@endcomponent

<!-- Main Content -->

<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card author-box">
                    <div class="card-body">
                        {{-- <div class="author-box-center">
                            <img alt="image" src="assets/img/users/user-1.png"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">Sarah Smith</a>
                            </div>
                            <div class="author-box-job">Web Developer</div>
                        </div> --}}
                        <div class="text-left">

                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Name : first_name surname</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Age : patient_age</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">patient_DOB : patient_DOB</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Allergy : allergy</div>
                            </div>

                        </div>
                        <div class="text-left">

                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Name : first_name surname</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Age : patient_age</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">patient_DOB : patient_DOB</div>
                            </div>
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Allergy : allergy</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
