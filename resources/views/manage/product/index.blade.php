@extends('manage.layout')
@section('title', __('List'))

@section('content')
<h1>{{__('List')}}</h1>
<a href="{{route($_routeBase.'create')}}" class="btn btn-primary">{{__('Create')}}</a>
<hr>
<div class="row">
    <table class="table">
    <thead>
        <tr>
            <th>{{__("Name")}}</th>
            <th>{{__("SKU")}}</th>
            <th>{{__("Created at")}}</th>
            <th>{{__("Updated at")}}</th>
            <th>{{__("Actions")}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($list as $object)
    <tr>
        <td>{{$object->name}}</td>
        <td>{{$object->sku}}</td>
        <td>{{$object->created_at}}</td>
        <td>{{$object->updated_at}}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button onclick="window.location='{{route($_routeBase . 'show', [$object])}}'" class="btn btn-secondary">{{__('Details')}}</button>
                <button onclick="window.location='{{route($_routeBase . 'edit', [$object])}}'" class="btn btn-primary">{{__('Edit')}}</button>
                <button class="btn btn-danger" form="deleteForm{{$object->id}}">{{__('Delete')}}</button>
            </div>
            <form action="{{route($_routeBase . 'destroy', [$object])}}" id="deleteForm{{$object->id}}" onsubmit="return confirm('{{__('Are you sure want to delete this ?')}}')" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <hr>
    {{ $list->links() }}
</div>
@endsection
