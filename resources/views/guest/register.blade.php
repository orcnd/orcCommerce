@extends('guest.layout')

@section('title', __('Register'))

@section('content')
<h1>{{__('Register')}}</h1>
<form method="POST" action="{{route('register')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">{{__('Name')}}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="name">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
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
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password-confirm" class="form-label">{{__('Confirm Password')}}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">    
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">
        {{__('Register')}}
    </button>
</form> 
@endsection 