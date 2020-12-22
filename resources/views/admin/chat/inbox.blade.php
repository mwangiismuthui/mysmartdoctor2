@extends('layouts.app',['pageTitle' => __(' Chat')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Chat') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Chat Inbox') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('chat-create'))
            <a href="{{ url('/admin/chat/create') }}" class="btn btn-success btn-sm" title="Add New  Chat">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>
            @endif

            <br />
            <br />
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th width='300'>Content</th>
                            <th>Created At</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chat as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ Auth::user()->role == 'patient' ? \App\User::find($item->from)->doctor->given_name :'' }}
                                {{ Auth::user()->role == 'doctor' ? \App\User::find($item->from)->patient->first_name  :''}}
                            </td>
                            <td>
                                {{ Auth::user()->role == 'patient' ? \App\User::find($item->to)->patient->first_name :'' }}
                                {{ Auth::user()->role == 'doctor' ? \App\User::find($item->to)->doctor->given_name  :''}}
                            </td>
                            <td>  {!! $item->content !!}</td>
                            <td> {{Helper::globalDateTime($item->created_at)}} </td>
                            <td>
                                
                                {{-- <a href="{{ url('/admin/chat/' . $item->id) }}" title="View"><button
                                    class="btn btn-info btn-sm"><i class="feather-16"
                                        data-feather="eye"></i></button></a> --}}
                                @if (Helper::authCheck('chat-edit'))
                                <a href="{{ url('/admin/chat/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('chat-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/chat' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="sweetalertDelete({{$item->id}})"><i class="feather-16"
                                            data-feather="trash-2"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination-wrapper"> {!! $chat->appends(['search' => Request::get('search')])->render() !!} --}}
            </div>
        </div>

    </div>
</div>
</div>

@endsection
