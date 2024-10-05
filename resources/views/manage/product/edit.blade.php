@extends('manage.layout')
@section('title', __('Edit') . ' - ' . $data->name)

@section('content')
<h1>{{__('Edit')}} - {{ $data->name }}</h1>
    <div class="row">
        <div class="col-12 col-xl-4">
            <form action="{{route($_routeBase . 'update', [$data])}}" method="POST">
                @method('patch')
                @csrf
                
                <div class="form-group mb-2">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $data->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="SKU">{{ __('SKU') }}</label>
                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" value="{{ old('sku', $data->sku) }}">
                    @error('sku')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $data->price) }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror   
                </div>
                <div class="form-group mb-2">
                    <label for="description">{{ __('Description') }}</label>    
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', $data->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="category_id">{{ __('Category') }}</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">{{ __('Top Level') }}</option>
                        @foreach ($topList as $object)
                            <option value="{{ $object->id }}" @if ($object->id === $data->category_id) selected @endif>{{ $object->name }}</option>
                        @endforeach
                    </select>
                </div>  
                
                
                <button type="submit" class="btn btn-primary w-100">{{ __('Update') }}</button>
            
            </form>
        </div>
    </div>
@endsection