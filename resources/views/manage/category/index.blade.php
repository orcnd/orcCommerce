@extends('manage.layout')
@section('title', __('List'))

@section('content')
<h1>{{__('List')}}</h1>
<a href="{{route($_routeBase.'create')}}" class="btn btn-primary">{{__('Create')}}</a>
<hr>
<div class="row">
    @foreach ($list as $object)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$object->name}}</h5>
                    <p class="card-text">{{$object->description}}</p>
                    <a href="{{route($_routeBase . 'show', [$object])}}" class="btn btn-primary">{{__('Details')}}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection 

