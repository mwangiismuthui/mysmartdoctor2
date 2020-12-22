@extends('front-end.layouts.app',['pageTitle' => __($page->page_name)])
@section('content')

<main style="transform: none;">
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href=" {{url('/')}} ">Home</a></li>
                <li><a href="#">page</a></li>
                <li>{{$page->page_name}} </li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="col-xl-12 col-lg-12">
            <nav id="secondary_nav" class="" style="">
                <div class="container">
                    <ul class="clearfix">
                        <h4 class="active text-white">{{$page->page_name}}</h4>
                    </ul>
                </div>
            </nav>
            <div class="content mt-2" style="line-height: 24px;">
                {!!$page->content!!}
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
