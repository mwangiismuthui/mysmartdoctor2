@extends('layouts.app',['pageTitle' => __(' Slider Show')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Slider') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Slider') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/slider') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
                        @if (Helper::authCheck('slider-edit'))
                        <a href="{{ url('/admin/slider/' . $slider->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (Helper::authCheck('slider-delete'))
                        <form method="POST" id="deleteButton{{$slider->id}}" action="{{ url('admin/slider' . '/' . $slider->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$slider->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $slider->id }}</td>
                                    </tr>
                                    <tr><th> Image </th><td> <img class="img-full" src="{{ Storage::url($slider->image) }}" alt=""> </td></tr><tr><th> Text </th><td> {{ $slider->text }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
