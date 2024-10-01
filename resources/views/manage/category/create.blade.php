@extends('manage.layout')
@section('title', __('Create'))

@section('content')
    <h1>{{ __('Create') }}</h1>
    <div class="row">
        <div class="col-12 col-xl-4">
            <form action="{{ route($_routeBase . 'store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="slug">{{ __('Slug') }}</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="parent_id">{{ __('Parent') }}</label>
                    <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                        <option value="">{{ __('Top Level') }}</option>
                        @foreach ($topList as $object)
                            <option value="{{ $object->id }}">{{ $object->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">{{ __('Create') }}</button>
            </form>
        </div>
    </div>
@endsection
