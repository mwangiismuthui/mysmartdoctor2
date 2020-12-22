<div class="form-group {{ $errors->has('given_name') ? 'has-error' : ''}}">
    <label for="given_name" class="control-label">{{ __('Given Name') }}</label>
    <input class="form-control" name="given_name" type="text" id="given_name"
        value="{{ isset($doctor->given_name) ? $doctor->given_name : old('given_name')}}" required>
    {!! $errors->first('given_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your given_name?</div>
</div>
<div class="form-group {{ $errors->has('family_name') ? 'has-error' : ''}}">
    <label for="family_name" class="control-label">{{ __('Family Name') }}</label>
    <input class="form-control" name="family_name" type="text" id="family_name"
        value="{{ isset($doctor->family_name) ? $doctor->family_name : old('family_name')}}" required>
    {!! $errors->first('family_name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your family_name?</div>
</div>
{{-- <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
<label for="email" class="control-label">{{ __('Email') }}</label>
<input class="form-control" name="email" type="email" id="email"
    value="{{ isset($doctor->email) ? $doctor->email : old('email')}}" required>
{!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
<div class="invalid-feedback"> What's your email?</div>
</div> --}}
<div class="form-group {{ $errors->has('languages_spoken') ? 'has-error' : ''}}">
    <label for="languages_spoken" class="control-label">{{ __('Languages Spoken') }}</label>
    <textarea class="form-control" rows="5" name="languages_spoken" type="textarea" id="languages_spoken"
        required>{{ isset($doctor->languages_spoken) ? $doctor->languages_spoken : ''}}</textarea>
    {!! $errors->first('languages_spoken', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your languages_spoken?</div>
</div>
<div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
    <label for="education" class="control-label">{{ __('Education') }}</label>
    <textarea class="form-control" rows="5" name="education" type="textarea" id="education"
        required>{{ isset($doctor->education) ? $doctor->education : ''}}</textarea>
    {!! $errors->first('education', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your education?</div>
</div>
<div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : ''}}">
    <label for="mobile_no" class="control-label">{{ __('Mobile No') }}</label>
    <input class="form-control" name="mobile_no" type="number" id="mobile_no"
        value="{{ isset($doctor->mobile_no) ? $doctor->mobile_no : old('mobile_no')}}" required>
    {!! $errors->first('mobile_no', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your mobile no?</div>
</div>
<div class="form-group {{ $errors->has('specialization') ? 'has-error' : ''}}">
    <label for="specialization" class="control-label">{{ __('Specialization') }}</label>
    <input class="form-control" name="specialization" type="text" id="specialization"
        value="{{ isset($doctor->specialization) ? $doctor->specialization : old('specialization')}}" required>
    {!! $errors->first('specialization', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your specialization?</div>
</div>
<div class="form-group {{ $errors->has('alternative_mobile_no') ? 'has-error' : ''}}">
    <label for="alternative_mobile_no" class="control-label">{{ __('Alternative Mobile No') }}</label>
    <input class="form-control" name="alternative_mobile_no" type="number" id="alternative_mobile_no"
        value="{{ isset($doctor->alternative_mobile_no) ? $doctor->alternative_mobile_no : old('alternative_mobile_no')}}"
        required>
    {!! $errors->first('alternative_mobile_no', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your alternative mobile no?</div>
</div>
<div class="form-group {{ $errors->has('private_practice_address') ? 'has-error' : ''}}">
    <label for="private_practice_address" class="control-label">{{ __('Private Practice  Address') }}</label>
    <textarea class="form-control" rows="5" name="private_practice_address" type="textarea"
        id="private_practice_address"
        required>{{ isset($doctor->private_practice_address) ? $doctor->private_practice_address : ''}}</textarea>
    {!! $errors->first('private_practice _address', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your private practice address?</div>
</div>
<div class="form-group">
    <label for="areas_Of_expertise"
        class="control-label">{{ __('Areas Of expertise-     General dentist /Oral & Maxiilofacial surgeon/Implantalogist/paedoontcis /consultant Orthodontist /Restorative dental specialist /Community Dentist ') }}</label>

    <label for="areas_Of_expertise1" class="control-label" style=" display: -webkit-inline-box;padding: 0px;">1.<input
            class="form-control" name="areas_Of_expertise1"
            value="{{ isset($doctor->areas_Of_expertise1) ? $doctor->areas_Of_expertise1 : old('areas_Of_expertise1')}}"
            type="text" id="areas_Of_expertise1" style=" margin-left: 21px;"></label><br>
    <label for="areas_Of_expertise2" class="control-label" style=" display: -webkit-inline-box;padding: 0px;">2.<input
            class="form-control" name="areas_Of_expertise2"
            value="{{ isset($doctor->areas_Of_expertise2) ? $doctor->areas_Of_expertise2 : old('areas_Of_expertise2')}}"
            type="text" id="areas_Of_expertise2" style=" margin-left: 21px;"></label><br>
    <label for="areas_Of_expertise3" class="control-label" style=" display: -webkit-inline-box;padding: 0px;">3.<input
            class="form-control"
            value="{{ isset($doctor->areas_Of_expertise3) ? $doctor->areas_Of_expertise3 : old('areas_Of_expertise3')}}"
            name="areas_Of_expertise3" type="text" id="areas_Of_expertise3" style=" margin-left: 21px;"></label>

</div>
<div class="form-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
    <label for="qualification" class="control-label">{{ __('Qualification') }}</label>
    <textarea class="form-control" rows="5" name="qualification" type="textarea" id="qualification"
        required>{{ isset($doctor->qualification) ? $doctor->qualification : ''}}</textarea>
    {!! $errors->first('qualification', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your qualification?</div>
</div>
<div class="form-group {{ $errors->has('professional_experiences') ? 'has-error' : ''}}">
    <label for="professional_experiences" class="control-label">{{ __('Professional Experiences') }}</label>
    <textarea class="form-control" rows="5" name="professional_experiences" type="textarea"
        id="professional_experiences"
        required>{{ isset($doctor->professional_experiences) ? $doctor->professional_experiences : ''}}</textarea>
    {!! $errors->first('professional_experiences', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your professional_experiences?</div>
</div>

<div class="form-group">
    <label for="medical_centers_that_you_are_parctsing"
        class="control-label">{{ __('Hospital name /Medical Centers that you are parctsing  -   ') }}</label><br>

    <label for="medical_centers_that_you_are_parctsing1" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">1.<input class="form-control"
            name="medical_centers_that_you_are_parctsing1"
            value="{{ isset($doctor->medical_centers_that_you_are_parctsing1) ? $doctor->medical_centers_that_you_are_parctsing1 : old('medical_centers_that_you_are_parctsing1')}}"
            type="text" id="medical_centers_that_you_are_parctsing1" style=" margin-left: 21px;"></label><br>
    <label for="medical_centers_that_you_are_parctsing2" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">2.<input class="form-control"
            name="medical_centers_that_you_are_parctsing2"
            value="{{ isset($doctor->medical_centers_that_you_are_parctsing2) ? $doctor->medical_centers_that_you_are_parctsing2 : old('medical_centers_that_you_are_parctsing2')}}"
            type="text" id="medical_centers_that_you_are_parctsing2" style=" margin-left: 21px;"></label><br>
    <label for="medical_centers_that_you_are_parctsing3" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">3.<input class="form-control"
            name="medical_centers_that_you_are_parctsing3"
            value="{{ isset($doctor->medical_centers_that_you_are_parctsing3) ? $doctor->medical_centers_that_you_are_parctsing3 : old('medical_centers_that_you_are_parctsing3')}}"
            type="text" id="medical_centers_that_you_are_parctsing3" style=" margin-left: 21px;"></label>

</div>
<div class="form-group">
    <label for="locations_that_you_are_practicing"
        class="control-label">{{ __('Add the preference District /Regions/Locations  that you are practicing - ') }}</label><br>

    <label for="locations_that_you_are_practicing1" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">1.<input class="form-control"
            name="locations_that_you_are_practicing1"
            value="{{ isset($doctor->locations_that_you_are_practicing1) ? $doctor->locations_that_you_are_practicing1 : old('locations_that_you_are_practicing1')}}"
            type="text" id="locations_that_you_are_practicing1" style=" margin-left: 21px;"></label><br>
    <label for="locations_that_you_are_practicing2" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">2.<input class="form-control"
            name="locations_that_you_are_practicing2"
            value="{{ isset($doctor->locations_that_you_are_practicing2) ? $doctor->locations_that_you_are_practicing2 : old('locations_that_you_are_practicing2')}}"
            type="text" id="locations_that_you_are_practicing2" style=" margin-left: 21px;"></label><br>
    <label for="locations_that_you_are_practicing3" class="control-label"
        style=" display: -webkit-inline-box;padding: 0px;">3.<input class="form-control"
            name="locations_that_you_are_practicing3"
            value="{{ isset($doctor->locations_that_you_are_practicing3) ? $doctor->locations_that_you_are_practicing3 : old('locations_that_you_are_practicing3')}}"
            type="text" id="locations_that_you_are_practicing3" style=" margin-left: 21px;"></label>

</div>

<div class="form-group {{ $errors->has('refereed_person') ? 'has-error' : ''}}">
    <label for="refereed_person" class="control-label">{{ __('Name of the refereed person') }}</label>
    <input class="form-control" name="refereed_person" type="text" id="refereed_person"
        value="{{ isset($doctor->refereed_person) ? $doctor->refereed_person : old('refereed_person')}}" required>
    {!! $errors->first('refereed_person', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your refereed_person?</div>
</div>
<div class="form-group {{ $errors->has('refereed_person_mobile_number ') ? 'has-error' : ''}}">
    <label for="refereed_person_mobile_number "
        class="control-label">{{ __('Mobile number (referred person) ') }}</label>
    <input class="form-control" name="refereed_person_mobile_number" type="number" id="refereed_person_mobile_number "
        value="{{ isset($doctor->refereed_person_mobile_number ) ? $doctor->refereed_person_mobile_number  : old('refereed_person_mobile_number ')}}"
        required>
    {!! $errors->first('refereed_person_mobile_number ', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your refereed_person_mobile_number ?</div>
</div>
<div class="form-group {{ $errors->has('passport') ? 'has-error' : ''}}">
    <label for="passport"
        class="control-label">{{ __('NIC or passport No                                       ') }}</label>
    <input class="form-control" name="passport" type="number" id="passport"
        value="{{ isset($doctor->passport) ? $doctor->passport : old('passport')}}" required>
    {!! $errors->first('passport', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your passport?</div>
</div>
<!-- Upload and crop -->


<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ __('Uplaod the passport size profile pict-  ') }}</label><br>

    <input type="file" class="btn js-loadfile" name="image" id="loadImage" accept=".png, .jpg, .jpeg,.zip,.mp4" value="Upload" />
    <button class="btn js-crop">Crop</button>
    <div class="crop-wrapper">
        <div class="top-overlay">
        </div>
        <div class="bottom-overlay">
        </div>
        <div class="left-overlay">
        </div>
        <div class="right-overlay">
        </div>
        <div class="overlay">
            <div class="overlay-inner">
            </div>
        </div>
        <img class="resize-image" src="img/image.jpg" alt="image for resizing">
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <input type='text' name="oldimage" value="{{ isset($doctor->image) ? $doctor->image : ''}}" hidden>
    <div class="avatar-upload">
        <div class="avatar-preview">
            <img id="image" class="avatar-preview"
            src="{{URL::to('/') .'/storage/uploads/'. $doctor->image}}" alt="image" />
        </div>
    </div>
    {!! $errors->first('image', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your image?</div>
</div>

<div class="form-group {{ $errors->has('registration_no') ? 'has-error' : ''}}">
    <label for="registration_no" class="control-label">{{ __('Medical council Registration No
        ') }}</label>
    <input class="form-control" name="registration_no" type="number" id="registration_no"
        value="{{ isset($doctor->registration_no) ? $doctor->registration_no : old('registration_no')}}" required>
    {!! $errors->first('registration_no', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your registration no?</div>
</div>

<div class="col-4">
    <div class="form-group {{ $errors->has('signature') ? 'has-error' : ''}}">
        <label for="signature" class="control-label">{{ __('signature') }}</label><br>
        <input type='file' name="signature" accept=".png, .jpg, .jpeg,.zip,.mp4"
            onchange="showMyImage(this,'signature')"
            value="{{ isset($doctor->signature) ? $doctor->signature : old('signature')}}">
        <input type='text' name="oldsignature" value="{{ isset($doctor->signature) ? $doctor->signature : ''}}" hidden>
        <div class="avatar-upload">
            <div class="avatar-preview">
                <img id="signature" class="avatar-preview"
                    src="{{ isset($doctor->signature) ? Storage::url($doctor->signature) : asset('upload.png')}}"
                    alt="image" />
            </div>
        </div>
        {!! $errors->first('signature', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your signature?</div>
    </div>
</div>
<div class="form-group {{ $errors->has('specialization') ? 'has-error' : ''}}">
    <label for="specialization" class="control-label">{{ __('Specialization') }}</label>
    <input class="form-control" name="specialization" type="text" id="specialization"
        value="{{ isset($doctor->specialization) ? $doctor->specialization : old('specialization')}}" required>
    {!! $errors->first('specialization', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your specialization?</div>
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ __('Location') }}</label>
    <input class="form-control" name="location" type="text" id="location"
        value="{{ isset($doctor->location) ? $doctor->location : old('location')}}" required>
    {!! $errors->first('location', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your location?</div>
</div>
<div class="form-group {{ $errors->has('patient_number') ? 'has-error' : ''}}">
    <label for="patient_number" class="control-label">{{ __('How much patient can treatment per day ') }}</label>
    <input class="form-control" name="patient_number" type="number" id="patient_number"
        value="{{ isset($doctor->patient_number) ? $doctor->patient_number : old('patient_number')}}" required>
    {!! $errors->first('patient_number', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your patient_number?</div>
</div>
<div class="form-group {{ $errors->has('doctor_charge') ? 'has-error' : ''}}">
    <label for="doctor_charge" class="control-label">{{ __('Doctor charge') }}</label>
    <input class="form-control" name="doctor_charge" type="number" id="doctor_charge"
        value="{{ isset($doctor->doctor_charge) ? $doctor->doctor_charge : old('doctor_charge')}}" required>
    {!! $errors->first('doctor_charge', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your Doctor charge?</div>
</div>

<div class="form-group {{ $errors->has('conditions') ? 'has-error' : ''}}">
    <label for="conditions" class="control-label"></label>
    <div class="pretty p-default" style=" display: -webkit-box;">
        <input type="checkbox" name="conditions"
            {{ isset($doctor->conditions) ? $doctor->conditions=='on' ? 'checked' :'' : old('conditions')}}>
        <div class="state p-primary" style="margin-left: 10px;">
            <label>A agree to terms of conditions &amp; Privacy policy …….. Accepted or not accepted </label>
        </div>
    </div>
</div>
<div class="border p-5">
    <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
        <label for="username" class="control-label">{{ __('Username ') }}</label>
        <input class="form-control" name="username" type="text" id="username"
            value="{{ isset($doctor->user->username) ? $doctor->user->username : old('username')}}">
        {!! $errors->first('username', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your username?</div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="control-label">{{ __('Password ') }}</label>
        <input class="form-control" name="password" type="password" id="password" value="">
        {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
        <div class="invalid-feedback"> What's your password?</div>
    </div>

    <div class="form-group">
        <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
            value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
    </div>

</div>
<script>
    var resizeableImage = function(image_target) {
// Some variable and settings
var $container,
orig_src = new Image(),
image_target = $(image_target).get(0),
event_state = {},
constrain = false,
min_width = 60, // Change as required
min_height = 60,
max_width = 1800, // Change as required
max_height = 1900,
init_height=500,
resize_canvas = document.createElement('canvas');
imageData=null;

init = function(){

//load a file with html5 file api
$('.js-loadfile').change(function(evt) {
    var files = evt.target.files; // FileList object
    var reader = new FileReader();

    reader.onload = function(e) {
      imageData=reader.result;
      loadData();
    }
    reader.readAsDataURL(files[0]);
});

//add the reset evewnthandler
$('.js-reset').click(function() {
    if(imageData)
        loadData();
});


// When resizing, we will always use this copy of the original as the base
orig_src.src=image_target.src;

// Wrap the image with the container and add resize handles
$(image_target).height(init_height)
.wrap('<div class="resize-container"></div>')
.before('<span class="resize-handle resize-handle-nw"></span>')
.before('<span class="resize-handle resize-handle-ne"></span>')
.after('<span class="resize-handle resize-handle-se"></span>')
.after('<span class="resize-handle resize-handle-sw"></span>');

// Assign the container to a variable
$container =  $('.resize-container');

$container.prepend('<div class="resize-container-ontop"></div>');

// Add events
$container.on('mousedown touchstart', '.resize-handle', startResize);
$container.on('mousedown touchstart', '.resize-container-ontop', startMoving);
$('.js-crop').on('click', crop);
};

loadData = function() {
    // e.preventDefault();
    console.log('reset');

//set the image target
image_target.src=imageData;
orig_src.src=image_target.src;

//set the image tot he init height
$(image_target).css({
    width:'auto',
    height:init_height
});


//resize the canvas
$(orig_src).bind('load',function() {
    resizeImageCanvas($(image_target).width(),$(image_target).height());
});
};

startResize = function(e){
e.preventDefault();
e.stopPropagation();
saveEventState(e);
$(document).on('mousemove touchmove', resizing);
$(document).on('mouseup touchend', endResize);
};

endResize = function(e){
resizeImageCanvas($(image_target).width(), $(image_target).height())
e.preventDefault();
$(document).off('mouseup touchend', endResize);
$(document).off('mousemove touchmove', resizing);
};

saveEventState = function(e){
// Save the initial event details and container state
event_state.container_width = $container.width();
event_state.container_height = $container.height();
event_state.container_left = $container.offset().left;
event_state.container_top = $container.offset().top;
event_state.mouse_x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft();
event_state.mouse_y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();

// This is a fix for mobile safari
// For some reason it does not allow a direct copy of the touches property
if(typeof e.originalEvent.touches !== 'undefined'){
    event_state.touches = [];
    $.each(e.originalEvent.touches, function(i, ob){
      event_state.touches[i] = {};
      event_state.touches[i].clientX = 0+ob.clientX;
      event_state.touches[i].clientY = 0+ob.clientY;
    });
}
event_state.evnt = e;
};

resizing = function(e){
var mouse={},width,height,left,top,offset=$container.offset();
mouse.x = (e.clientX || e.pageX || e.originalEvent.touches[0].clientX) + $(window).scrollLeft();
mouse.y = (e.clientY || e.pageY || e.originalEvent.touches[0].clientY) + $(window).scrollTop();

// Position image differently depending on the corner dragged and constraints
if( $(event_state.evnt.target).hasClass('resize-handle-se') ){
  width = mouse.x - event_state.container_left;
  height = mouse.y  - event_state.container_top;
  left = event_state.container_left;
  top = event_state.container_top;
} else if($(event_state.evnt.target).hasClass('resize-handle-sw') ){
  width = event_state.container_width - (mouse.x - event_state.container_left);
  height = mouse.y  - event_state.container_top;
  left = mouse.x;
  top = event_state.container_top;
} else if($(event_state.evnt.target).hasClass('resize-handle-nw') ){
  width = event_state.container_width - (mouse.x - event_state.container_left);
  height = event_state.container_height - (mouse.y - event_state.container_top);
  left = mouse.x;
  top = mouse.y;
  if(constrain || e.shiftKey){
    top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
  }
} else if($(event_state.evnt.target).hasClass('resize-handle-ne') ){
  width = mouse.x - event_state.container_left;
  height = event_state.container_height - (mouse.y - event_state.container_top);
  left = event_state.container_left;
  top = mouse.y;
  if(constrain || e.shiftKey){
    top = mouse.y - ((width / orig_src.width * orig_src.height) - height);
  }
}

// Optionally maintain aspect ratio
if(constrain || e.shiftKey){
  height = width / orig_src.width * orig_src.height;
}

if(width > min_width && height > min_height && width < max_width && height < max_height){
  // To improve performance you might limit how often resizeImage() is called
  resizeImage(width, height);
  // Without this Firefox will not re-calculate the the image dimensions until drag end
  $container.offset({'left': left, 'top': top});
}
}

resizeImage = function(width, height){
$(image_target).width(width).height(height);
};

resizeImageCanvas = function(width, height){
resize_canvas.width = width;
resize_canvas.height = height;
resize_canvas.getContext('2d').drawImage(orig_src, 0, 0, width, height);
$(image_target).attr('src', resize_canvas.toDataURL("image/png"));
//$(image_target).width(width).height(height);
};

startMoving = function(e){
e.preventDefault();
e.stopPropagation();
saveEventState(e);
$(document).on('mousemove touchmove', moving);
$(document).on('mouseup touchend', endMoving);
};

endMoving = function(e){
e.preventDefault();
$(document).off('mouseup touchend', endMoving);
$(document).off('mousemove touchmove', moving);
};

moving = function(e){
var  mouse={}, touches;
e.preventDefault();
e.stopPropagation();

touches = e.originalEvent.touches;

mouse.x = (e.clientX || e.pageX || touches[0].clientX) + $(window).scrollLeft();
mouse.y = (e.clientY || e.pageY || touches[0].clientY) + $(window).scrollTop();
$container.offset({
  'left': mouse.x - ( event_state.mouse_x - event_state.container_left ),
  'top': mouse.y - ( event_state.mouse_y - event_state.container_top )
});
// Watch for pinch zoom gesture while moving
if(event_state.touches && event_state.touches.length > 1 && touches.length > 1){
  var width = event_state.container_width, height = event_state.container_height;
  var a = event_state.touches[0].clientX - event_state.touches[1].clientX;
  a = a * a;
  var b = event_state.touches[0].clientY - event_state.touches[1].clientY;
  b = b * b;
  var dist1 = Math.sqrt( a + b );

  a = e.originalEvent.touches[0].clientX - touches[1].clientX;
  a = a * a;
  b = e.originalEvent.touches[0].clientY - touches[1].clientY;
  b = b * b;
  var dist2 = Math.sqrt( a + b );

  var ratio = dist2 /dist1;

  width = width * ratio;
  height = height * ratio;
  // To improve performance you might limit how often resizeImage() is called
  resizeImage(width, height);
}
};

crop = function(e){
    e.preventDefault();
    console.log('cropping');
//Find the part of the image that is inside the crop box
var crop_canvas,
    left = $('.overlay').offset().left- $container.offset().left,
    top =  $('.overlay').offset().top - $container.offset().top,
    width = $('.overlay').width(),
    height = $('.overlay').height();
    console.log($('.overlay').offset())
    console.log($container.offset())
crop_canvas = document.createElement('canvas');

crop_canvas.width = width;
crop_canvas.height = height;

crop_canvas.getContext('2d').drawImage(image_target, left, top, width, height, 0, 0, width, height);
var dataURL=crop_canvas.toDataURL("image/png");
image_target.src=dataURL;
orig_src.src=image_target.src;


$(image_target).bind("load",function() {
    $(this).css({
        width:width,
        height:height
    }).unbind('load').parent().css({
        top:$('.overlay').offset().top- $('.crop-wrapper').offset().top,
        left:$('.overlay').offset().left- $('.crop-wrapper').offset().left
    })
});
// window.open(crop_canvas.toDataURL("image/png"));
var imagesrc = $(".resize-image").attr('src');
console.log(imagesrc+"Image this");
var img = document.createElement("img");
// added `width` , `height` properties to `img` attributes
img.width = "250px";
img.height = "250px";
img.src =imagesrc;
var preview = document.getElementById("loadImage");
preview.appendChild(img);
var dataM =$('#loadImage').val();
console.log(dataM+"preview this");
console.log(preview+"preview this");
console.log(img+"img this");
}

init();
};

// Kick everything off with the target image
resizeableImage($('.resize-image'));
</script>
