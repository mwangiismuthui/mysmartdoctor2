<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-12" style="border: 1px solid; padding: 20px;">
                {{-- <p>
                    <a href="{{ url('/') }}" title="Smart Care Dental">
                <img src="frontEnd/img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
                </a>
                </p> --}}
                <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/contact') }}" accept-charset="UTF-8"
                    class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <label for="name" class="control-label">{{ __('Name') }}</label>
                        <input class="form-control" name="name" type="text" id="name"
                            value="{{ isset($contact->name) ? $contact->name : old('name')}}" required>
                        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your name?</div>
                    </div>
                    <div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
                        <label for="mobile_number" class="control-label">{{ __('Mobile Number') }}</label>
                        <input class="form-control" name="mobile_number" type="text" id="mobile_number"
                            value="{{ isset($contact->mobile_number) ? $contact->mobile_number : old('mobile_number')}}"
                            required>
                        {!! $errors->first('mobile_number', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your mobile_number?</div>
                    </div>
                    <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                        <label for="message" class="control-label">{{ __('Message') }}</label>
                        {{-- <textarea name="message" id="message"   required
                            >{{ isset($contact->message) ? $contact->message : old('message')}}</textarea> --}}
                        <input class="form-control" name="message" type="text" id="message" value="" required>
                        {!! $errors->first('message', '<p class="text-danger">:message</p>') !!}
                        <div class="invalid-feedback"> What's your message?</div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </form>

            </div>
            <div class="col-lg-3 col-md-4">
                <h5>About</h5>
                <ul class="links">
                    <li><a href="{{ url('/about-us') }}">About us</a></li>
                    <li><a href="{{ url('/faq') }}">FAQ</a></li>
                    <li><a href="{{ url('/informed-consent') }}">Informed consent </a></li>
                    <li><a href="{{ url('/terms-and-conditions') }}">Terms and conditions</a></li>
                    <li><a href="{{ url('/privacy-policy') }}">Privacy</a></li>


                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><a href="{{ url('/doctor/list') }}">Doctors</a></li>
                    <li><a href="{{ url('/patient/signup') }}">Join as a Patient</a></li>
                    <li><a href="{{ url('/doctor/signup') }}">Join as a Doctor</a></li>

                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href="#"><i class="icon_mobile"></i>0775566168/0777148715</a></li>
                    <li><a href="mailto:info@findoctor.com"><i class="icon_mail_alt"></i>support@smartcaredental.org</a>
                    </li>
                </ul>
                <div class="follow_us">
                    <h5>Follow us</h5>
                    <ul>
                        <li><a href="https://www.facebook.com/Smart-Care-Dental-104048811401711"><i class="social_facebook"></i></a></li>
                        <li><a href="https://twitter.com/DoctorOnCare1"><i class="social_twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/69917151"><i class="social_linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/doctoroncare/"><i class="social_instagram"></i></a></li>
                        <li><a href="https://youtu.be/KRzauTBSo0o"><i class="social_youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr>
        <div class="row">
            <div class="col-md-8">
                {{-- <ul id="additional_links">
                </ul> --}}
            </div>
            <div class="col-md-4">
                <div id="copy">© {{date('Y')}} Smart Care Dental</div>
            </div>
        </div>
    </div>
</footer>
