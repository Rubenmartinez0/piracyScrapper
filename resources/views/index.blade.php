@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <a class="btn btn-warning" href="/portals"><strong>Manage portals</strong></a>
                <div class="form-group">
                    
                    <div class="d-flex">
                       @foreach ($portals as $portal)
                       <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="portalsToQuery[]" value={{ $portal->id }} checked>
                            <label class="form-check-label" for="flexCheckDefault">{{ $portal->name }}</label>
                        </div>
                       @endforeach               

                    </div>

                    
                </div>
                <div class="input-group">

                    <input required="required" type="text" class="form-control mr-2" name="searchTerm" placeholder="Query">
                    <button class="btn btn-primary" type="submit" title="Query">Search</button>
                </div>
            </form>

            @isset($portalsToQuery)
                <div class="mt-5">
                    <h4>Links for "{{ $query }}" search:</h4>
                    @forelse($portalsToQuery as $portal)
                        <div class="card mb-3">
                            <div class="card-body">
                                <label><strong>{{ $portal->name }}: <strong><a target="_blank" href={{ $portal->link }}>{{ $portal->link }}</a></label>
                            </div>
                        </div>
                    @empty
                        <option>There are no available results</option>       
                    @endforelse

                </div>
            @endisset

            @isset($message)
                <div class="mt-5">
                    <h4>{{ $message }} "{{$query }}".</h4>
                </div>
            @endisset


        </div>
    </div>
</div>
@endsection
