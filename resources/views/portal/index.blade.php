@extends('layouts.app')
@section('content')
<div class="row m-5">
    <div class="col-12">
        <h1>Portals list</h1>
        <a class="btn btn-success mb-3 float-right" href="/portal/create">Create new portal</a>
        
        <div class="col-4" style="justify-content:center;"> 
          @if($message = Session::get('success'))
            <div class="alert alert-success">
              <strong>{{ $message }}</strong> 
            </div>
          @endif
            
          @if($message = Session::get('fail'))
            <div class="alert alert-danger">
              <strong>{{ $message }}</strong>
            </div>
          @endif
        </div>
          <table class="table table-hover table-responsive-lg">
            <thead>
                <tr>
                  <th class="font-weight-bold">Portal</th>
                  {{-- <th class="font-weight-bold">Home URL</th> --}}
                  <th class="font-weight-bold">Search URL</th>
                  <th class="font-weight-bold">Space subtitute</th>
                  <th class="font-weight-bold">Creation date</th>
                  <th class="font-weight-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portals as $portal)
                  <tr>
                      <td><strong><a href={{ $portal->homeUrl }}>{{$portal->name}}</a></strong></td>
                      {{-- <td><a href={{ $portal->homeUrl }}>{{$portal->homeUrl}}</a></td> --}}
                      <td>{{$portal->searchUrl}}</td>
                      <td>{{$portal->spaceSubstitute}}</td>
                      <td>{{$portal->created_at}}</td>
                      <td class="row">
                          <a href="{{ route('portal.editView', $portal->id)}}" class="btn btn-warning mr-5">Edit</a>
                          <form action="{{ route('portal.delete', $portal->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete portal {{$portal->name}}?')" >Delete</button>
                          </form>
                      </td>
                  </tr>
                @empty
                  <h2 class="text-danger">There are currently no portals</h2>
                @endforelse
              </tbody>
          </table>
    
      <a class="btn btn-primary float-left" href="/">Back</a>
    <div>
</div>


@endsection
@section('scripts')
  <!-- CDN datatables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js" defer></script>

  <!-- CDN datatables searchpanes-->
  <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js" defer></script>
  
  <!-- CDN datatables select-->
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js" defer></script>
  
  <!-- CDN buttons select-->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" defer></script>
  
  <script src="{{ asset('js/user/index.js') }}" type="text/javascript"></script>
@endsection
