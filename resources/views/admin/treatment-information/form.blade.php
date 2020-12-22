<div class="row">
    <div class="col">
        <div class="form-group {{ $errors->has('patient_id') ? 'has-error' : ''}}">
            <label for="patient_id" class="control-label">{{ __('Patient') }}</label>
            {{-- <input class="form-control" name="patient_id" type="number" id="patient_id"
                value="{{ isset($treatmentinformation->patient_id) ? $treatmentinformation->patient_id : old('patient_id')}}"
            required> --}}

            <select class="form-control select2" name="patient_id">
                @foreach (\App\Patient::all() as $item)
                <option value="{{$item->id}}" @if(isset($treatmentinformation->patient_id))
                    @if($treatmentinformation->patient_id == $item->id) selected @endif
                    @endif>
                    {{$item->first_name .' '.$item->surname}}
                </option>
                @endforeach
            </select>
            {!! $errors->first('patient_id', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your patient ?</div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="col-10">
                <div class="form-group {{ $errors->has('treatment') ? 'has-error' : ''}}">
                    <label for="treatment" class="control-label">{{ __('Treatment') }}</label>
                    {{-- <input class="form-control" name="treatment" type="text" id="treatment"
                    value="{{ isset($treatmentinformation->treatment) ? $treatmentinformation->treatment : old('treatment')}}"
                    required> --}}

                    <select class="form-control selectric" name="treatment">
                        @foreach (DB::table('treatments')->get() as $item)
                        <option value="{{$item->treatment}}" @if(isset($minicategory->treatment))
                            @if($minicategory->treatment == $item->treatment) selected @endif
                            @endif>
                            {{$item->treatment}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('treatment', '<p class="text-danger">:message</p>') !!}
                    <div class="invalid-feedback"> What's your treatment?</div>
                </div>
            </div>
            <div class="col-1">
                <!-- Button trigger modal -->
                <label for="" class="control-label">{{ __('Add') }}</label>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
            <label for="time" class="control-label">{{ __('Time') }}</label>
            <input class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" type="time" id="time"
                value="{{ isset($treatmentinformation->time) ? $treatmentinformation->time : old('time')}}" required>

            {!! $errors->first('time', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your time?</div>
        </div>
    </div>
</div>



<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    <label for="cost" class="control-label">{{ __('Cost') }}</label>
    <input class="form-control" name="cost" type="number" id="cost" min="0"
        value="{{ isset($treatmentinformation->cost) ? $treatmentinformation->cost : old('cost')}}" required>
    {!! $errors->first('cost', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your cost?</div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group {{ $errors->has('total_paid') ? 'has-error' : ''}}">
            <label for="total_paid" class="control-label">{{ __('Total Paid') }}</label>
            <input class="form-control" name="total_paid" type="number" id="total_paid" min="0"
                value="{{ isset($treatmentinformation->total_paid) ? $treatmentinformation->total_paid : old('total_paid')}}"
                required>
            {!! $errors->first('total_paid', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your total_paid?</div>
        </div>
    </div>
    <div class="col">
        <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
            <label for="balance" class="control-label">{{ __('Balance') }}</label>
            <input class="form-control" name="balance" type="number" id="balance" min="0"
                value="{{ isset($treatmentinformation->balance) ? $treatmentinformation->balance : ''}}" required>
            {!! $errors->first('balance', '<p class="text-danger">:message</p>') !!}
            <div class="invalid-feedback"> What's your balance?</div>
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>

@push('js')
<script>
    $('#cost').keyup(function (e) {
        var cost = $('#cost').val();
        var balance = 0;

        var balance = parseInt(balance) + parseInt(cost);

        // alert(balance);
        $('#balance').val(balance);
    });

</script>
@endpush
