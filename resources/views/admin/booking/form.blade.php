{{-- <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
<label for="patient_id" class="control-label">{{ __('Patient Id') }}</label>
<input class="form-control" name="patient_id" type="number" id="patient_id"
    value="{{ isset($booking->patient_id) ? $booking->patient_id : old('patient_id')}}" required>
{!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
<div class="invalid-feedback"> What's your patient name?</div>
</div> --}}
<div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : ''}}">
    <label for="doctor_id" class="control-label">{{ __('Doctor Info') }}</label>
    {{-- <input class="form-control" name="doctor_id" type="number" id="doctor_id" value="{{ isset($booking->doctor_id) ? $booking->doctor_id : old('doctor_id')}}"
    required> --}}

    <select class="form-control select2" name="doctor_id">

        @foreach (\App\Doctor::all() as $item)
        <option value="{{$item->id}}" @if(isset($booking->doctor_id))
            @if($booking->doctor_id == $item->name) selected @endif
            @endif>
            {{$item->given_name}}
        </option>
        @endforeach
    </select>
    {!! $errors->first('doctor_id', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your doctor name?</div>
</div>



<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ __('Date') }}</label>
    <input class="form-control" name="date" type="date" id="date" min="{{date("Y-m-d")}}"
        value="{{ isset($booking->date) ? $booking->date : old('date')}}" required>
    {!! $errors->first('date', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your date?</div>
</div>

<div class="form-group {{ $errors->has('specialty ') ? 'has-error' : ''}}">
    <label for="specialty " class="control-label">{{ __('Specialty') }}</label>
    <input class="form-control" name="specialty" type="text" id="specialty "
        value="{{ isset($booking->specialty ) ? $booking->specialty  : old('specialty ')}}" required>
    {!! $errors->first('specialty ', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your specialty ?</div>
</div>
<div class="form-group {{ $errors->has('urgency ') ? 'has-error' : ''}}">
    <label for="urgency" class="control-label">{{ __('Urgency') }}</label>
    <select name="urgency" class="form-control" id="urgency">
        <option value="Instant or 24/7">Instant or 24/7</option>
        <option value="Non urgent">Non urgent</option>
    </select>
    {!! $errors->first('urgency ', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your urgency ?</div>
</div>


<div class="row">
    <div class="col">
        <div class="form-group {{ $errors->has('professional_fee') ? 'has-error' : ''}}">
            <label for="professional_fee " class="control-label">{{ __('Professional Fee') }}</label>
            <input class="form-control" name="professional_fee" type="number" id="professional_fee "
                value="{{ isset($booking->professional_fee ) ? $booking->professional_fee  : old('professional_fee ')}}"
                required>
            {!! $errors->first('professional_fee ', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your professional fee ?</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('service_fee') ? 'has-error' : ''}}">
            <label for="service_fee" class="control-label">{{ __('Service Fee') }}</label>
            <input class="form-control" name="service_fee" type="number" id="service_fee "
                value="{{ isset($booking->service_fee) ? $booking->service_fee  : old('service_fee ')}}" required>
            {!! $errors->first('service_fee ', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your professional fee ?</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
            <label for="total" class="control-label">{{ __('Total') }}</label>
            <input class="form-control" name="total" type="number" id="total "
                value="{{ isset($booking->total) ? $booking->total  : old('total ')}}" required>
            {!! $errors->first('total ', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your total ?</div>
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Booking') }}">
</div>
