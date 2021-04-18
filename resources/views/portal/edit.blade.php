@extends('layouts.app')
@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h3>Edit portal {{$portal->name}}</h3>
    
    @if($message = Session::get('success'))
        <div class="col-12" style="justify-content:center;"> 
          <div class="alert alert-success">
            <strong>{{ $message }}</strong> 
          </div>
        </div>
    @endif
    <form method="POST" action="{{ route('portal.update', $portal->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name"><strong>Name:</strong></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $portal->name }}"/>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="homeUrl"><strong>Home URL:</strong></label>
            <input type="text" class="form-control @error('homeUrl') is-invalid @enderror" name="homeUrl" value="{{ $portal->homeUrl }}"/>
            @error('homeUrl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="searchUrl"><strong>Search URL:</strong></label>
            <input type="text" class="form-control @error('searchUrl') is-invalid @enderror" name="searchUrl" value="{{ $portal->searchUrl }}"/>
            @error('searchUrl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="spaceSubstitute"><strong>Space Subtitute:</strong></label>
            <input type="text" class="form-control @error('spaceSubstitute') is-invalid @enderror" name="spaceSubstitute" value="{{ $portal->spaceSubstitute }}"/>
            @error('spaceSubstitute')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <a class="btn btn-primary float-left" href="/portals">Back</a>
        <button type="submit" class="btn btn-success float-right">Save Changes</button>
    </form>
</div>

@endsection