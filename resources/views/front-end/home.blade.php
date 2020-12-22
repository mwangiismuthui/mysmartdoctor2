@extends('front-end.layouts.app',['pageTitle' => __('Home')])
@section('content')
<div class="">
    <section id="tiny" class="tinyslide">

        <aside class="slides">
            @foreach (\App\Slider::all() as $item)
            <figure>
                <img src="{{ URL::to('/') }}/storage/uploads/{{$item->image}} " alt="" />
                <figcaption class="slider-text">
                    {{$item->text}}
                </figcaption>
            </figure>
            @endforeach



        </aside>
    </section>
</div>
<!-- /Hero -->

<div class="container margin_120_95">
    <div class="main_title">
        <h2>Discover the <strong>online</strong> appointment!</h2>

    </div>
    <div class="row add_bottom_30">
        <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
                <span></span>
                <h3>Find a Doctor</h3>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
                <span></span>
                <h3>View profile</h3>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
                <h3>Book a visit</h3>

            </div>
        </div>
    </div>

    <!-- /row -->
    <p class="text-center"><a href="{{url('/doctor/list')}}" class="btn_1 medium">Find Doctor</a></p>

</div>
<!-- /container -->

<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Most Viewed doctors</h2>

        </div>
        <div id="recommended" class="owl-carousel owl-theme mx-3 border border-black">
            @foreach (App\Doctor::all() as $item)
            <div class="item shadow h-100 mx-1 my-2">
                <a href="#">
                    <img src=" {{Storage::url($item->image)}} " alt="">
                </a>
                <div class="title">
                    <h6> {{$item->given_name}}</em></h6>
                    <h6> {{$item->specialty}}</em></h6>
                </div>
            </div>
            @endforeach

        </div>
        <!-- /carousel -->
    </div>
    <!-- /container -->
</div>


<div id="app_section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="justify-content-center">
                <h3>Our services
                    <strong> - What can we </strong> do for you?</h3>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>



<!-- /app_section -->
<div class="demo">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider2" class="owl-carousel">
                    <div class="post-slide2">

                        <div class="post-content">
                            <div class="post-img">
                                <a href="#"><img src="img/s-1.png" style="height: 100px; width: 100px" alt=""></a>
                            </div>
                            <h3 class="post-title"><a href="#">Radiology Requests </a></h3>
                            <p class="post-description">
                                Do You need Dental X rays or any other diagnostic imaging? OurDdoctors can have an
                                electronic referral request sent to the inbox of your online account for you to take to
                                your preferred provider
                            </p>
                        </div>
                    </div>

                    <div class="post-slide2">

                        <div class="post-content">
                            <div class="post-img">
                                <a href="#"><img src="img/s-2.png" style="height: 100px; width: 100px" alt=""></a>
                            </div>
                            <h3 class="post-title"><a href="#">Pathology Requests </a></h3>
                            <p class="post-description">
                                If you need omplete blood count.or an assessment for blood sugar ,You can request
                                pathology after consulting with one of our Doctors online
                            </p>
                        </div>
                    </div>

                    <div class="post-slide2">

                        <div class="post-content">
                            <div class="post-img">
                                <a href="#"><img src="img/s-3.png" style="height: 100px; width: 100px" alt=""></a>
                            </div>
                            <h3 class="post-title"><a href="#">Prescriptions </a></h3>
                            <p class="post-description">
                                You will get your prescription to the inbox of your online account.You can download or
                                share or whatsapp to your nearest pharmacy
                            </p>
                        </div>
                    </div>

                    <div class="post-slide2">

                        <div class="post-content">
                            <div class="post-img">
                                <a href="#"><img src="img/s-4.png" style="height: 100px; width: 100px" alt=""></a>
                            </div>
                            <h3 class="post-title"><a href="#">Medical Certificate </a></h3>
                            <p class="post-description">
                                Need to call in sick and supply a doctor's certificate to your Employer? You do not need
                                to get out of bed.We are here to help
                            </p>
                        </div>
                    </div>
                    <div class="post-slide2">

                        <div class="post-content">
                            <div class="post-img">
                                <a href="#"><img src="img/s-5.png" style="height: 100px; width: 100px" alt=""></a>
                            </div>
                            <h3 class="post-title"><a href="#">Specialist Doctors </a></h3>
                            <p class="post-description">
                                If your condition need treatment by a speclaists.Talk to one of our Dental specialists
                                who are specialist and receive your referral for hospital or admission
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TESTIMONIALS -->
{{-- <section class="testimonials">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="main_title mt-4">
                    <h2>Video Presentation</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                                <div style=" ">

                                    <div class="col-md-12">

                                        <object data="https://www.youtube.com/embed/PRTtempi2mA?autoplay=1"
                                        width="1200" height="800"></object>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF TESTIMONIALS --> --}}
<!-- TESTIMONIALS -->
{{-- <section class="testimonials">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="main_title mt-4">
                    <h2>Testimonials</h2>

                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="news-slider" class="owl-carousel">
                                @foreach (App\Testimonial::all() as $item)
                                <div class="post-slide">
                                    <div class="post-img">
                                        <a href="#">
                                            <img src="{{Storage::url($item->image)}}" style="height: 60% ;width: 60%;"
                                                alt="">

                                        </a>
                                    </div>
                                    <div class="post-review">
                                        <ul class="post-bar">
                                        </ul>
                                        <p class="post-description">{{Str::words($item->description,200 , '...')}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- END OF TESTIMONIALS -->
<!-- Why choose Us -->
<div id="app_section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="justify-content-center">
                <h3>Why choose Us</h3>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<section class="about_doctors">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">


                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="img/a-2.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>Open Day & Night </b></u> <br>
                                    7 Days a Week
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/a-3.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>Immediate Service</b></u> <br> Our Doctors endeavor to take your video call
                                    immediately
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/a-4.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>Licensed Doctors</b></u> <br> Registered, fully qualified, and experienced
                                    specialists Doctors
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="img/a-5.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>Safe & Secure</b></u><br>
                                    We use 256 bit SSL Certificates, which includes digital certificate authentication
                                    and 256 bit data encryption
                                </div>

                            </div>
                            <div class="col-md-4">
                                <img src="img/a-6.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>Electronic & Online</b></u><br>
                                    No more paper with all medical documents made available in the Inbox of your
                                    application
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/a-7.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <u><b>5 Star Rating</b></u><br>
                                    Rate the service of your Doctor immediately after your consult out of 5 stars

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about_doctors">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="main_title mt-4">
                    <h2>How Telehealth/Teledentistry Benefits You
                    </h2>

                </div>


                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row mt-3 ">
                            <div class="col-md-4">
                                <img src="img/t-6.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b> Save travel Time</b> <br>

                                    No need to waste time travelling to the Doctor for something that can be simply
                                    diagnosed and treated online
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/t-1.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b> Avoid Getting Risk
                                    </b> <br>
                                    Clinics, medical centres and hospitals are typically where known pathogens and germs
                                    can spread. By having an online consultation, you are avoiding the possibility of
                                    this transmission.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/t-2.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b>Privacy
                                    </b>
                                    <br> By having a consultation from the privacy of your home or your preferred
                                    location, you can feel more comfortable discussing sensitive topics
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="img/t-3.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b>
                                        Rest Longer
                                    </b>
                                    <br>
                                    Doctors often advise use to rest in bed, and that’s where you can now see the doctor
                                    from. By not needing to travel and spend hours on the go, you’re likely to recover a
                                    lot quicker.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/t-4.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b>
                                        24/7

                                    </b>
                                    <br> Being a technology platform, we aim to have day-round coverage of providers
                                    available to consult with you at a suitable time, as soon as possible
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/t-5.png" alt="" class="center img-fluid"><br>
                                <div class="des">
                                    <b>
                                        For the Whole family

                                    </b>
                                    <br>Old or young, anyone can use our platform to access healthcare – anytime,
                                    anywhere. Parents are able to book a consultation on behalf of their children or
                                    elderly.
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about_doctors">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="main_title mt-4">
                    <h2>About our doctors
                    </h2>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2 des">
                                <b>Sri Lankan Registered and Accredited</b> <br>
                                <hr>
                                Healthcare & Support Providers on our platform are registered & accredited in
                                Sri Lanka
                            </div>
                            <div class="col-md-2 des">
                                <b>Internationally trained</b> <br>
                                <hr>
                                All the doctors in our flatform are internationally trained specialists doctors

                            </div>
                            <div class="col-md-2 des">
                                <b>Highly Experienced</b><br>
                                <hr>
                                Doctors on our platform are highly experienced in their profession – with some
                                providers having up to 30 years of experience
                            </div>
                            <div class="col-md-2 des">
                                <b>Genuinely Care</b><br>
                                <hr>
                                Doctors on our platform are known to have a friendly and caring nature. We
                                hand-select our providers with the same mission in mind.
                            </div>
                            <div class="col-md-2 des">
                                <b>Speak Your Language</b><br>
                                <hr>
                                Providers Doctor's on our platform speak various languages – making it easier if
                                English
                                is a second language for you or anyone in your family.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF About our doctors -->
<!-- About our doctors  -->

<section class="about_doctors">
    <div class="container">
        <div class="main_title mt-4">
            <h2>Blogs
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider8" class="owl-carousel">
                    @foreach (\App\Blog::all() as $item)
                    <div class="post-slide8">
                        <div class="post-img">
                            <img src="{{Storage::url($item->image)}}" alt="">
                            <div class="over-layer">
                                <ul class="post-link">
                                    <li><a href="{{url('/blog/'.$item->id)}}" class="fa fa-search"></a></li>
                                    <li><a href="{{url('/blog/'.$item->id)}}" class="fa fa-link"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="{{url('/blog/'.$item->id)}}">{{$item->name}}</a>
                            </h3>
                            <p class="post-description">
                                {{ str_replace("&nbsp;",' ',strip_tags(Str::limit($item->description, 200, '...'))) }}
                            </p>
                            <a href="{{url('/blog/'.$item->id)}}" class="read-more">read more</a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF About our doctors -->
@endsection
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<style>
    .post-slide {
        overflow: hidden;
        margin-right: 15px;
        background-color: #fff !important
    }

    .post-slide .post-img {
        float: left;
        width: 50%;
        position: relative;
        margin-right: 30px
    }

    .post-slide .post-img img {
        width: 100%;
        height: auto
    }

    .post-slide .post-date {
        background: #ec3c6a;
        color: #fff;
        position: absolute;
        top: 0;
        right: 0;
        display: block;
        padding: 2% 3%;
        width: 60px;
        height: 60px;
        text-align: center;
        transition: all .5s ease
    }

    .post-slide .date {
        display: block;
        font-size: 20px;
        font-weight: 700
    }

    .post-slide .month {
        display: block;
        font-size: 11px;
        text-transform: uppercase
    }

    .post-slide .post-review {
        padding: 5% 3% 1% 0;
        border-top: 3px solid #38cfd8
    }

    .post-slide:hover .post-review {
        border-top-color: #ec3c6a
    }

    .post-slide .post-title {
        margin: 0 0 10px 0
    }

    .post-slide .post-title a {
        font-size: 14px;
        color: #333;
        text-transform: uppercase
    }

    .post-slide .post-title a:hover {
        text-decoration: none;
        font-weight: 700
    }

    .post-slide .post-bar {
        padding: 0;
        list-style: none;
        text-transform: uppercase;
        position: relative;
        margin-bottom: 20px
    }

    .post-slide .post-bar:after,
    .post-slide .post-bar:before {
        border: 1px solid #38cfd8;
        bottom: -10px;
        content: "";
        display: block;
        position: absolute;
        right: 36%;
        width: 25px
    }

    .post-slide .post-bar:before {
        border: 1px solid #ec3c6a;
        right: 32%
    }

    .post-slide .post-bar li {
        color: #555;
        font-size: 10px;
        margin-right: 10px;
        display: inline-block
    }

    .post-slide .post-bar li a {
        font-size: 13px;
        text-decoration: none;
        text-transform: uppercase;
        color: #ec3c6a
    }

    .post-slide .post-bar li a:hover {
        color: #ec3c6a
    }

    .post-slide .post-bar li i {
        color: #777;
        margin-right: 5px
    }

    .post-slide .post-description {
        font-size: 12px;
        line-height: 21px;
        color: #444454
    }

    .owl-theme .owl-controls {
        margin-top: 30px
    }

    .owl-theme .owl-controls .owl-page span {
        background: #fff;
        border: 2px solid #37a6a4
    }

    .owl-theme .owl-controls .owl-page.active span,
    .owl-theme .owl-controls.clickable .owl-page:hover span {
        background: #37a6a4
    }

    @media only screen and (max-width:990px) {
        .post-slide .post-img {
            width: 100%
        }

        .post-slide .post-review {
            width: 100%;
            border-bottom: 4px solid #ec3c6a
        }

        .post-slide .post-bar:before {
            left: 0
        }

        .post-slide .post-bar:after {
            left: 25px
        }
    }

    .shadow-effect {
        background: #fff;
        padding: 20px;
        border-radius: 4px;
        text-align: center;
        border: 1px solid #ECECEC;
        box-shadow: 0 19px 38px rgba(0, 0, 0, 0.10), 0 15px 12px rgba(0, 0, 0, 0.02);
    }

    #customers-testimonials .shadow-effect p {
        font-family: inherit;
        font-size: 17px;
        line-height: 1.5;
        margin: 0 0 17px 0;
        font-weight: 300;
    }

    .testimonial-name {
        margin: -17px auto 0;
        display: table;
        width: auto;
        background: #3190E7;
        padding: 9px 35px;
        border-radius: 12px;
        text-align: center;
        color: #fff;
        box-shadow: 0 9px 18px rgba(0, 0, 0, 0.12), 0 5px 7px rgba(0, 0, 0, 0.05);
    }

    #customers-testimonials .item {
        text-align: center;
        padding: 50px;
        margin-bottom: 80px;
        opacity: .2;
        -webkit-transform: scale3d(0.8, 0.8, 1);
        transform: scale3d(0.8, 0.8, 1);
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    #customers-testimonials .owl-item.active.center .item {
        opacity: 1;
        -webkit-transform: scale3d(1.0, 1.0, 1);
        transform: scale3d(1.0, 1.0, 1);
    }

    .img-circle {
        transform-style: preserve-3d;
        max-width: 90px;
        margin: 0 auto 17px;
    }


    /******************  News Slider Demo-2 *******************/
    .demo {
        background: linear-gradient(to right, #fcc, #d3d3d3)
    }

    .post-slide2 {
        margin: 0 15px;
        box-shadow: 0 1px 2px rgba(43, 59, 93, .3);
        margin-bottom: 2em
    }

    .post-slide2 .post-img {
        overflow: hidden
    }

    .post-slide2 .post-img img {
        width: 100%;
        height: auto;
        transform: scale(1);
        transition: all 1s ease-in-out 0s
    }

    .post-slide2:hover .post-img img {
        transform: scale(1.08)
    }

    .post-slide2 .post-content {
        background: #fff;
        padding: 20px
    }

    .post-slide2 .post-title {
        font-size: 17px;
        font-weight: 600;
        margin-top: 0;
        text-transform: capitalize
    }

    .post-slide2 .post-title a {
        display: inline-block;
        color: grey;
        transition: all .3s ease 0s
    }

    .post-slide2 .post-title a:hover {
        color: #3d3030;
        text-decoration: none
    }

    .post-slide2 .post-description {
        font-size: 15px;
        color: #676767;
        line-height: 24px;
        margin-bottom: 14px
    }

    .post-slide2 .post-bar {
        padding: 0;
        margin-bottom: 15px;
        list-style: none
    }

    .post-slide2 .post-bar li {
        color: #676767;
        padding: 2px 0
    }

    .post-slide2 .post-bar li i {
        margin-right: 5px
    }

    .post-slide2 .post-bar li a {
        display: inline-block;
        font-size: 12px;
        color: grey;
        transition: all .3s ease 0s
    }

    .post-slide2 .post-bar li a:after {
        content: ","
    }

    .post-slide2 .post-bar li a:last-child:after {
        content: ""
    }

    .post-slide2 .post-bar li a:hover {
        color: #3d3030;
        text-decoration: none
    }

    .post-slide2 .read-more {
        display: inline-block;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        background: #e7989a;
        border-bottom-right-radius: 10px;
        text-transform: capitalize;
        transition: all .3s linear
    }

    .post-slide2 .read-more:hover {
        background: #333;
        text-decoration: none
    }

    .post-slide8 {
        margin: 0 15px;
        position: relative;
        background: #fff;
        box-shadow: 0 1px 2px rgba(43, 59, 93, .3);
        margin-bottom: 2em
    }

    .post-slide8 .post-img {
        position: relative;
        overflow: hidden
    }

    .post-slide8 .post-img img {
        width: 100%;
        height: auto
    }

    .post-slide8 .over-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background: rgba(0, 0, 0, .6);
        transition: all .3s ease
    }

    .post-slide8:hover .over-layer {
        opacity: 1
    }

    .post-slide8 .post-link {
        margin: 0;
        padding: 0;
        position: relative;
        top: 45%;
        text-align: center
    }

    .post-slide8 .post-link li {
        display: inline-block;
        list-style: none;
        margin-right: 20px
    }

    .post-slide8 .post-link li a {
        color: #fff;
        font-size: 20px
    }

    .post-slide8 .post-link li a:hover {
        color: #ff8b3d;
        text-decoration: none
    }

    .post-slide8 .post-date {
        position: absolute;
        top: 10%;
        left: 4%
    }

    .post-slide8 .date {
        display: inline-block;
        border-radius: 3px 0 0 3px;
        padding: 5px 10px;
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        background: #333;
        float: left
    }

    .post-slide8 .month {
        display: inline-block;
        border-radius: 0 3px 3px 0;
        padding: 5px 13px;
        color: #111;
        font-size: 20px;
        font-weight: 700;
        background: #ff8b3d
    }

    .post-slide8 .post-content {
        padding: 30px
    }

    .post-slide8 .post-title {
        margin: 0 0 15px 0
    }

    .post-slide8 .post-title a {
        font-size: 18px;
        font-weight: 700;
        color: #333;
        display: inline-block;
        text-transform: capitalize;
        transition: all .3s ease 0s
    }

    .post-slide8 .post-title a:hover {
        text-decoration: none;
        color: #ff8b3d
    }

    .post-slide8 .post-description {
        font-size: 14px;
        line-height: 24px;
        color: grey
    }

    .post-slide8 .read-more {
        color: #333;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        position: relative;
        transition: color .2s linear
    }

    .post-slide8 .read-more:hover {
        text-decoration: none;
        color: #ff8b3d
    }

    .post-slide8 .read-more:after {
        content: "";
        position: absolute;
        width: 30%;
        display: block;
        border: 1px solid #ff8b3d;
        transition: all .3s ease
    }

    .post-slide8 .read-more:hover:after {
        width: 100%
    }

    @media only screen and (max-width:479px) {
        .post-slide8 .month {
            font-size: 14px
        }

        .post-slide8 .date {
            font-size: 14px
        }

        .center {
            height: 50%;
            width: 50%;
        }
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;

    }

    .des {
        display: block;
        margin-left: auto;
        margin-right: auto;
        /* width: 50%; */
        text-align: -webkit-center;
        margin-bottom: 31px;
    }

    .owl-item.active.center {
        vertical-align: middle;
        width: 268px;
        height: 274px;
        border-radius: 50% !important;
        border: 1px solid #0083ca;
        ;
    }

    .owl-item.cloned {
        vertical-align: middle;
        width: 268px;
        height: 274px;
        border-radius: 50% !important;
        /* background: #0083ca; */
        /* border: 1px solid #0083ca; */
    }

    .owl-item.active {
        vertical-align: middle;
        width: 268px;
        height: 274px;
        border-radius: 50% !important;
    }

</style>
@endpush

@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>

<script>
    jQuery(document).ready(function ($) {
        "use strict";
        //  TESTIMONIALS CAROUSEL HOOK
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 0,
            autoplay: true,
            dots: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });
    $("#news-slider2").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        pagination: false,
        navigationText: false,
        autoPlay: true
    });
    $("#news-slider").owlCarousel({
        items: 2,
        itemsDesktop: [1199, 2],
        itemsMobile: [600, 1],
        pagination: true,
        autoPlay: true
    });
    $("#news-slider8").owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        autoPlay: true
    });
</script>
@endpush
