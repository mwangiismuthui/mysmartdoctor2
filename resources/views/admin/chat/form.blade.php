<div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
    <label for="to" class="control-label">{{ __('To') }}</label>
    <select name="to" id="to" class="form-control selectric">
        @if (Auth::user()->role == 'patient')
        @foreach (\App\User::where('role','doctor')->get() as $item)
        <option value="{{$item->id}}" @if(isset($chat->to))
            @if($chat->to == $item->id) selected @endif
            @endif
            >{{$item->doctor->given_name}}</option>
        @endforeach
        @elseif(Auth::user()->role == 'doctor')
        @foreach (\App\User::where('role','patient')->get() as $item)
        <option value="{{$item->id}}" @if(isset($chat->to))
            @if($chat->to == $item->id) selected @endif
            @endif
            >{{$item->patient->first_name.' '.$item->patient->surname}}</option>
        @endforeach
        @endif
    </select>
    <div class="invalid-feedback"> What's your to?</div>
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ __('Content') }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content"
        required>{{ isset($chat->content) ? $chat->content : ''}}</textarea>
    {!! $errors->first('content', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your content?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit"
        value="{{ $formMode === 'edit' ? __('Update') : __('Send') }}">
</div>
