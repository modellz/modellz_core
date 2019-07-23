@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')

  <!--pagination & search box-->
  @include('public_voting.inc.movie_search')
  <!--./pagination & search box-->
  @if(session('no_results'))
      <div class="alert alert-danger col-7 mx-auto">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{session('no_results')}}
          <button class="btn btn-primary"><a href="/public" style="color: white;"> Go Back !</a></button>
      </div>
  @endif
  @if(session('success_results'))
      <div class="alert alert-success col-7 mx-auto">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{session('success_results').' '}}
          <button class="btn btn-primary"><a href="/public" style="color: white;"> Go Back !</a></button>
      </div>
  @endif
    <div class="row">
            @foreach($movies as $movie)
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-2 mb-sm-2 mb-md-2 mb-lg-2">
                    <div class="card shadow p-2">
                        <img src="https://img.youtube.com/vi/6LD30ChPsSs/hqdefault.jpg" class="rounded-circle mx-auto p-2" width="30%">
                        <div>
                            <i class="fa fa-video-camera" aria-hidden="true"> :</i>
                            <strong>{{$movie->Film_name}}</strong><hr>
                            Director: {{$movie->Director_name}}<hr>
                            Duration: {{$movie->Film_Duration}}<hr>
                        </div>
                        <div class="pb-2">
                            <button class="btn btn-success float-right"><a href="/public/sfa/movies/{{$movie->id}}" style="color: white;">Click here to vote !</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
  <br/>
  <!--pagination & search box-->
  @include('public_voting.inc.movie_search')
  <!--./pagination & search box-->
@endsection
<!--./main content-->
<script>

</script>
@section('page_scripts')
@endsection