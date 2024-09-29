@extends('guest.layout')

@section('title', __('Login'))

@section('content')
<h1>{{__('Login')}}</h1>
<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">{{__('Email')}}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">{{__('Password')}}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">
        {{__('Login')}}
    </button>
</form>
@endsection