@extends('manage.layout')
@section('title', __('Details') . ' - ' . $data->name)

@section('content')
<h1>{{__('Details')}} - {{ $data->name }}</h1>
<a href="{{route($_routeBase . 'edit', [$data])}}" class="btn btn-primary">{{__('Edit')}}</a>
<form action="{{route($_routeBase . 'destroy', [$data])}}" onsubmit="return confirm('{{__('Are you sure want to delete this ?')}}')" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">{{__('Delete')}}</button>
</form>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Name')}}</h5>
                <p class="card-text">{{$data->name}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Slug')}}</h5>
                <p class="card-text">{{$data->slug}}</p>
            </div>
        </div>
    </div>  
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Description')}}</h5>
                <p class="card-text">{{$data->description}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{__('Parent')}}</h5>
                <p class="card-text">{{$data->parent_id}}</p>
            </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection 

