@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="container col-12 col-sm-12 col-md-6 col-lg-6 bg-white shadow rounded p-2">
            <h5 class="pl-2">Profile details :</h5>
            <table class="table table-hover">
                <tr>
                    <td>User name</td>
                    <td>: {{$data->name}}</td>
                </tr>
                <tr>
                    <td>Email ID</td>
                    <td>: {{$data->email}}</td>
                </tr>
                <tr>
                    <td>Producer</td>
                    <td>: {{$data->phone}}</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>: {{$data->location}}</td>
                </tr>
                <tr>
                    <td>Active from</td>
                    <td>: {{date('d-m-Y',strtotime($data->created_at))}}</td>
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