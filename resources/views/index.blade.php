@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <a class="btn btn-warning" href="/portals"><strong>Portals</strong></a>
                <div class="form-group">
                    
                    <div class="d-flex">
                       @foreach ($portals as $portal)
                       <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="portalsToQuery[]" value={{ $portal->id }} checked>
                            <label class="form-check-label" for="flexCheckDefault">{{ $portal->name }}</label>
                        </div>

                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="portalsToQuery[]" value=1 checked>
                            <label class="form-check-label" for="flexCheckDefault">Playdede.com</label>
                        </div>

                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="portalsToQuery[]" value=3 checked>
                            <label class="form-check-label" for="flexCheckDefault">Cuevana3.io</label>
                        </div>
                       @endforeach               

                    </div>

                    {{-- <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web1" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 1</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web2" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 2</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web3" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 3</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web4" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 4</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web5" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 5</label>
                        </div>                        
                    </div> --}}
                </div>
                <div class="input-group">

                    <input required="required" type="text" class="form-control mr-2" name="searchTerm" placeholder="Query">
                    <button class="btn btn-primary" type="submit" title="Query">Search</button>
                </div>
            </form>

            @isset($portalsToQuery)
                <div class="mt-5">
                    <h4>Search results for "{{ $query }}":</h4>
                    @forelse($portalsToQuery as $portal)
                        <div class="card mb-3">
                            <div class="card-header">
                                <label><strong>{{ $portal->name }}</strong><label>
                            </div>
                            <div class="card-body">
                                <label><strong>Post URL: <strong></label>
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
