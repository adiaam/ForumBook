@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        <!-- blade directive -->
        @method('PATCH') 
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <!-- Title -->
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{old('title') ?? $user->profile->title}}"
                           autocomplete="title" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Description -->
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <input id="description"
                           type="text"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description"
                           value="{{old('description')??$user->profile->description}}"
                           autocomplete="description" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Image-Url -->
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>

                    <input id="url"
                           type="text"
                           class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                           name="url"
                           value="{{ old('url') ?? $user->profile->url}}"
                           autocomplete="url" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
               
                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection