@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <div class="form-group">
                    <label for="name"><strong>Sitios webs:</strong></label>
                    <div class="d-flex">
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
                    </div>

                    <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web6" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 6</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web7" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 7</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web8" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 8</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web9" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 9</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" name="web10" value="1" checked>
                            <label class="form-check-label" for="flexCheckDefault">Web 10</label>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Query">
                            <span class="fas fa-search text-white">Search</span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="searchTerm" placeholder="Query">
                </div>
            </form>

            @isset($results)
                <div>
                    <h4>Search results of "{{ $results->query }}":</h4>
                    @forelse($results->webs as $result)
                        <label>Website: {{ $results->webUrl }}<label> <label>Post URL: {{ $results->postUrl }}</label>
                        <br>
                    @empty
                        <option>There are no available results</option>       
                    @endforelse

                </div>
            @endisset


        </div>
    </div>
</div>
@endsection
