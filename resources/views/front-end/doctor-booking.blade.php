@extends('front-end.layouts.app',['pageTitle' => __('Doctor Details and Booking')])
@section('content')

<main style="transform: none;">
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href=" {{url('/')}} ">Home</a></li>
                <li><a href="#">Doctior details</a></li>
                <li>{{$doctor->given_name}}</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->
    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <nav id="secondary_nav" class="" style="">
                    <div class="container">
                        <ul class="clearfix">
                            <h6 class="text-white"> <small>{{$doctor->specialization}}</small>
                                <br> DR. {{$doctor->given_name}} </h6>

                        </ul>
                    </div>
                </nav>
                <div id="section_1">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4" style="display: inline-grid;">
                                    <figure>
                                        <img src="{{Storage::url($doctor->image)}}" alt="" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8 border">
                                  <h6 class="mt-3 offset-3">Booking Charge</h6>

                                            <div class="checkbox mt-3">

                                                <label for="visit1" class="css-label">Doctor Charge
                                                    <strong>${{$doctor->doctor_charge}}</strong></label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="visit2" class="css-label">Service Charge
                                                    <strong>${{\App\BookingFee::find(1)->fee}}</strong></label>
                                            </div>

                                            <div class="checkbox">
                                                <label for="visit2" class="css-label">Total
                                                    <strong>${{$doctor->doctor_charge + \App\BookingFee::find(1)->fee}}</strong></label>
                                                    @php
                                                        $charge = $doctor->doctor_charge + \App\BookingFee::find(1)->fee;
                                                        $booking =\App\BookingFee::find(1)->fee;
                                                        $service =$doctor->doctor_charge;
                                                    @endphp
                                            </div>


                                </div>

                            </div>
                        </div>

                        <hr>

                        <!-- /profile -->
                        <div class="indent_title_in">
                            <i class="pe-7s-user"></i>
                            <h3>Professional statement</h3>
                        </div>
                        <div class="wrapper_indent">
                            <p><b>Languages Spoken:</b> {{$doctor->languages_spoken}} <br>
                            </p>
                            <h6>Areas Of Expertise</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="bullets">
                                        <li>{{$doctor->areas_Of_expertise1}}</li>
                                        <li>{{$doctor->areas_Of_expertise2}}</li>
                                        <li>{{$doctor->areas_Of_expertise3}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /row-->
                        </div>
                        <!-- /wrapper indent -->

                        <hr>

                        <div class="indent_title_in">
                            <i class="pe-7s-news-paper"></i>
                            <h3>Education</h3>
                        </div>
                        <div class="wrapper_indent">
                            <p> {{$doctor->education}}</p>
                        </div>
                        <!--  End wrapper indent -->

                        <hr>

                        <div class="indent_title_in">
                            <i class="pe-7s-rocket"></i>
                            <h3>About Doctor</h3>
                        </div>
                        <div class="wrapper_indent">
                            <h6 class="mb-2">Qualifications</h6>
                            <p>Education: {{$doctor->education}}</p>
                            <p>Qualification: {{$doctor->qualification}}</p>
                            <p>Experience: {{$doctor->professional_experiences }}</p>
                            <h6 class="mb-2">Medical Centers</h6>
                            <ul class='bullets'>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing1}}</li>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing2}}</li>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing3}}</li>
                            </ul>
                            <h6 class="mb-2">Private Practice locations</h6>
                            <ul class='bullets'>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing1}}</li>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing2}}</li>
                                <li> {{$doctor->medical_centers_that_you_are_parctsing3}}</li>
                            </ul>

                        </div>
                        <!--  End wrapper indent -->

                        <hr>
                    </div>
                    <!-- /section_1 -->
                </div>

            </div>

            <aside class="col-xl-6 col-lg-6" id="sidebar">
                <div class="box_general_3 booking">
                    @php
                    if (!Auth::check()) {
                        Session::put('url', Request::path());
                    }
                    @endphp
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('error')}}
                    </div>
                    @endif
                        <div class="title">
                            <h3>Book a Visit</h3>
                        </div>
                        <div class="row" style="margin-top: -24px;">


                            <div class="col-md-12">
                                <table class="table table-warning"  id="table_schedule1">
                                    <tr class="bg-success text-white">
                                        <th>Date</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Book</th>
                                    </tr>
                                    @foreach ($doctoravailable as $item)
                                    <tr>
                                        <td class="text-success font-weight-bold">{{$item->date}}</td>
                                        <td>{{$item->starting_time}}</td>
                                        <td>{{$item->ending_time}}</td>
                                    <td><a class="btn btn-warning btn-sm" onclick="alertShow(this.id,'{{$item->date}}','{{$item->starting_time}}','{{$item->ending_time}}')" id="{{ url('/charge?starting_time='.$item->starting_time.'&ending_time='.$item->ending_time.'&date='.$item->date.'&doctor_id='.$item->doctor_id.'&id='.$item->id.'&sadasdas='.$charge.'&booking='.$booking.'&service='.$service) }}" href="#">book</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>


                        </div>



                        <hr>
                        {{-- <button class="btn_1 full-width" type="submit">Book Now</button> --}}
                        {{-- <a href="{{url('/patient/signin')}}" class="btn_1 full-width">Book Now</a> --}}
                    </form>
                </div>
                <!-- /box_general -->
            </aside>
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>


<!-- The Modal -->
{{-- <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4>Calendar</h4>
            </div>
            <div class="card-body">
                <div class="fc-overflow">
                <div id="myEvent"></div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div> --}}
<!-- The Modal -->
<div id="conform" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                 {{$doctor->given_name}}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')

@endpush

@push('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function alertShow(id,date,starting_time,ending_time) {
        // alert(date);
        // alert($(this).data("date"))
        Swal.fire({
        title: 'Are you sure?',
        text: "Doctor Name: {{$doctor->given_name}}, Date: "+date+" Starting time: "+starting_time+" Ending time: "+ending_time,
        // icon: 'warning',
        imageUrl: '{{Storage::url($doctor->image)}}',
        imageHeight: 300,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Book !'
        }).then((result) => {
        if (result.isConfirmed) {
            location.href = id;
        }
        })
     }
</script>
@endpush
