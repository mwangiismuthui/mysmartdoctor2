@extends('layouts.app',['pageTitle' => __(' Testimonial Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Testimonial') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Testimonial') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/testimonials') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('testimonials-edit'))
            <a href="{{ url('/admin/testimonials/' . $testimonial->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('testimonials-delete'))
            <form method="POST" id="deleteButton{{$testimonial->id}}"
                action="{{ url('admin/testimonials' . '/' . $testimonial->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$testimonial->id}})"><i class="feather-16" data-feather="trash-2"></i>
                    {{ __('Delete') }}</button>
            </form>
            @endif
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $testimonial->id }}</td>
                        </tr>
                        <tr>
                            <th> Name </th>
                            <td> {{ $testimonial->name }} </td>
                        </tr>
                        <tr>
                            <th> Image </th>
                            <td> <img class="img-full" src="{{ Storage::url($testimonial->image) }}" alt=""> </td>
                        </tr>
                        <tr>
                            <th> Description </th>
                            <td> {{ $testimonial->description }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
