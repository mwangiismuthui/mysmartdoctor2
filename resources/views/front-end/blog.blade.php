@extends('front-end.layouts.app',['pageTitle' => __($blog->name)])
@section('content')

<main style="transform: none;">
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href=" {{url('/')}} ">Home</a></li>
                <li><a href="#">blog</a></li>
                <li>{{$blog->name}} </li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="col-xl-12 col-lg-12">
            <nav id="secondary_nav" class="" style="">
                <div class="container">
                    <ul class="clearfix">
                        <h4 class="active text-white">{{$blog->name}}</h4>
                    </ul>
                </div>
            </nav>
            <div class="content mt-2" style="line-height: 24px;">
                <img src="{{Storage::url($blog->image)}}" class="m-4" alt="">
                {!!$blog->description!!}
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
@push('css')
<style>
    li {
        list-style: inside !important;
    }

</style>
@endpush
