@extends('layouts.app',['pageTitle' => __(' Chat Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Chat') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Chat') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/chat') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16"
                        data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('chat-edit'))
            <a href="{{ url('/admin/chat/' . $chat->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('chat-delete'))
            <form method="POST" id="deleteButton{{$chat->id}}" action="{{ url('admin/chat' . '/' . $chat->id) }}"
                accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$chat->id}})"><i class="feather-16" data-feather="trash-2"></i>
                    {{ __('Delete') }}</button>
            </form>
            @endif
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th> From </th>
                            <td> {{ Auth::user()->role == 'patient' ? \App\User::find($chat->from)->patient->first_name :'' }}
                                {{ Auth::user()->role == 'doctor' ? \App\User::find($chat->from)->doctor->given_name :''}}
                            </td>
                        </tr>
                        <tr>
                            <th> To </th>
                            <td> {{ Auth::user()->role == 'patient' ? \App\User::find($chat->from)->patient->first_name :'' }}
                                {{ Auth::user()->role == 'doctor' ? \App\User::find($chat->from)->doctor->given_name :''}}
                            </td>
                        </tr>
                        <tr>
                            <th> Content </th>
                            <td> {{ $chat->content }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
