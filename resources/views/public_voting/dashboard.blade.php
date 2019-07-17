@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
    @if(session('success_msg'))
        <br/>
        <div class="alert alert-success col-6 mx-auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('success_msg')}}
        </div>
    @endif
  <h3>Hello Modellz! Its dashboard</h3>
@endsection
<!--./main content-->
<script>

</script>
@section('page_scripts')
@endsection