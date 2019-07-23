@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="container bg-white shadow rounded p-2">
            <div class="d-flex justify-content-center">
                <iframe width="420" height="345"  src="{{$movie->Film_Url}}">
                </iframe>
            </div>

            <br/>
            <h5 class="pl-2">Film details :</h5>
            <table class="table table-hover">
                <tr>
                    <td>Movie name</td>
                    <td>: {{$movie->Film_name}}</td>
                </tr>
                <tr>
                    <td>Director name</td>
                    <td>: {{$movie->Director_name}}</td>
                </tr>
                <tr>
                    <td>Producer</td>
                    <td>: {{$movie->Producer}}</td>
                </tr>
                <tr>
                    <td>Script writer</td>
                    <td>: {{$movie->Script_writer}}</td>
                </tr>
                <tr>
                    <td>Music composer</td>
                    <td>: {{$movie->Music_composer}}</td>
                </tr>
                <tr>
                    <td>Cinematographer</td>
                    <td>: {{$movie->Cinematographer}}</td>
                </tr>
                <tr>
                    <td>Production year</td>
                    <td>: {{$movie->Production_year}}</td>
                </tr>
                <tr>
                    <td>Film duration</td>
                    <td>: {{$movie->Film_Duration}}</td>
                </tr>


            </table>
        </div>
    </div>
  <br/>
@endsection
<!--./main content-->
<script>

</script>
@section('page_scripts')
@endsection