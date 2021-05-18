@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center p-4 justify-content-center bg-primary">
        <h1>ForumBook IT-2001</h1>
    </div>
    <hr>
    <h2>Herzlich Willkommen</h2>

    <!-- Authentication Links -->
    @guest
    <h2>Lieber Gast</h2>

    <!-- @if (Route::has('login'))
<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
@endif -->

    <!-- @if (Route::has('register'))
<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
@endif -->
    @else
    <h2> {{ Auth::user()->username }}</h2>
    <a href="/profile/{{ Auth::user()->id }}" class="btn btn-primary">Zum Profile</a>
    @endguest

</div>
@endsection