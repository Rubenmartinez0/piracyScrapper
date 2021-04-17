@extends('layouts.app')
@section('content')
<div class="container col-8 col-sm-8 col-md-6 col-lg-3 mt-5">
    <h3>Create portal</h3>
    
    @if($message = Session::get('success'))
        <div class="col-12" style="justify-content:center;"> 
          <div class="alert alert-success">
            <strong>{{ $message }}</strong> 
          </div>
        </div>
    @endif
    <form method="POST" action="{{ route('portal.store') }}">
        @csrf
        <div class="form-group">
            <label for="username"><strong>Name*:</strong></label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"/>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname"><strong>Home URL:</strong></label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"/>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname"><strong>Search URL:</strong></label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"/>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname"><strong>Space Subtitute:</strong></label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"/>
            @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <a class="btn btn-primary float-left" href="/portals">Back</a>
        <button type="submit" class="btn btn-success float-right">Create portal</button>
    </form>

    
    
</div>

@endsection