<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Video Chat</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{ asset('css/app.js') }}"></script>

    <style>
        * {
            font-family: 'Oxygen', sans-serif;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="app">
                    <video-chat :chat-room="'{{ $roomName }}'"></video-chat>
                </div>
            </div>

            <div class="col" style="margin-top: 40%">
                <div class="form-group align-bottom">
                    <label for="content">Message</label>
                    <textarea id="content" class="form-control" name="content" rows="3"></textarea>
                </div>
                <button class="btn btn-success btn-sm">Send</button>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
