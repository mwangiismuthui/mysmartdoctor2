 @extends('video.layouts.app')

 @section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default col-12">

                 <div class="content m-5">

                     {{-- <input type="file" accept="image/*" capture="camera" /> --}}

                     <div style="margin: 100px">
                         {!! Form::open(['url' => 'room/create']) !!}
                         {!! Form::label('roomName', 'Create or Join a Video Chat Room') !!}
                         {!! Form::text('roomName') !!}
                         {!! Form::submit('Go') !!}
                         {!! Form::close() !!}
                     </div>
                     @if($rooms)
                     @foreach ($rooms as $room)
                     <div class="waiting-room">
                         <label for="">Room Name:</label><br>
                         <a href="{{ url('/room/join/'.$room) }}">{{ $room }}</a>
                     </div>

                     @endforeach
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
 @push('css')
 <style>
     .waiting-room {
         margin: 100px 0px 20px 20px;
     }
 </style>
 @endpush