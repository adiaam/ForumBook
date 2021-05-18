@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="w-100 rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
            <div class="d-flex align-items-center pb-4">
                <h1>IT-2001: {{ $user->username }}</h1>
                <button class="btn btn-primary btn-sm ml-3">Follow</button>
            </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-4"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-4"><strong>0</strong> followers</div>
                <div class="pr-4"><strong>0</strong> following</div>
            </div>
            <div class="pt-5 font-weight-bold">
            {{$user->profile->title}}</div>
            <div><strong>{{$user->profile->description}}</strong></div>
            <div><a href="#" target="_blank">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <!-- Posts anzeigen -->
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100" alt="">
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection