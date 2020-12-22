@extends('front-end.layouts.app',['pageTitle' => __('Doctor List')])
@section('content')
<div id="breadcrumb">
    <div class="container">
        <ul>
            <li><a href=" {{url('/')}} ">Home</a></li>
            <li><a href="#">Doctior List</a></li>
        </ul>
    </div>
</div>
<div class="container margin_60_35" style="transform: none;">
    <div class="row" style="transform: none;">
        <div class="col-lg-12">
            <form method="get" action=" {{url('/doctor/search')}} " class="fadeInUp animated mb-5" style="">
                <div id="custom-search-input">
                    {{-- <div class="input-group">
                        <select name="" id="" class=" search-query">
                            <option value="name">Name</option>
                            <option value="specialization">Specialization</option>
                            <option value="location">Location</option>
                            <option value="time">Time</option>
                        </select>
                    </div> --}}
                    <div class="input-group">

                        <input type="text" name="search" class=" search-query"
                            placeholder="Ex. Name, Specialization,location,time ....">
                        <input type="submit" class="btn_search" value="Search">
                    </div>


                </div>
            </form>
            <div class="row">
                @foreach ($doctors as $item)
                <div class="col-md-4">
                    <div class="box_list wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">

                        <figure style="vertical-align: middle;width: 324px;height: 325px;border-radius: 50% !important;background: #0083ca;border: 1px solid #0083ca;">
                            <a href="{{url('doctor/details/'.$item->id)}}"><img src=" {{Storage::url($item->image)}} "
                                    class="img-fluid" alt="">
                                <div class="preview"><span>Read more</span></div>
                            </a>
                        </figure>
                        <div class="wrapper text-center">
                            <h3> {{$item->given_name}}</h3>

                            {{-- <p><b>Areas Of Expertise:</b> {{$item->areas_Of_expertise1}} <br>
                                {{$item->areas_Of_expertise2}}
                                <br>{{$item->areas_Of_expertise3}} </p> --}}
                                <small> {{$item->specialization}}</small>

                            <a href="badges.html" data-toggle="tooltip" data-placement="top"
                                data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg"
                                    width="15" height="15" alt=""></a>
                        </div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li><a href="{{url('doctor/details/'.$item->id)}}">Book now</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <!-- /box_list -->

            </div>
            <!-- /row -->

            {{-- <nav aria-label="" class="add_top_20">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
            <!-- /pagination -->
        </div>
        <!-- /col -->


    </div>
    <!-- /row -->
</div>
@endsection
@push('css')
<style>

</style>
@endpush
