@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')

  <!--pagination & search box-->
  <div class="row">
      <div class="col float-left">
          <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
      </div>

      <div class="col">
          <div class="form-group float-right" style="display: inline;">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Movies"  aria-describedby="basic-addon2">
                  <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--./pagination & search box-->
    <div class="row ml-md-5 ml-lg-5 ml-sm-0 ml-0">
            @foreach($times as $time)
                <div class="card shadow col-md-3 col-10 col-lg-3 col-sm-10 m-2 mr-md-4 mb-md-2">
                    <img src="https://img.youtube.com/vi/6LD30ChPsSs/hqdefault.jpg" class="rounded-circle mx-auto p-2" width="30%">
                    <table class="table table-hover" style="font-size: 13px;">
                        <tr>
                            <td>Movie</td>
                            <td>: yyyyyyy gfhfgh tghrty</td>
                        </tr>
                        <tr>
                            <td>Director name</td>
                            <td>: xxxxx</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>: 16:25</td>
                        </tr>
                    </table>
                    <div class="pb-2">
                        <button class="btn btn-success float-right"><a href="#" style="color: white;">Click here to vote !</a></button>
                    </div>

                </div>
            @endforeach
    </div>
  <!--pagination & search box-->
  <div class="row">
      <div class="col float-left">
          <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
      </div>

      <div class="col">
          <div class="form-group float-right" style="display: inline;">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Movies"  aria-describedby="basic-addon2">
                  <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--./pagination & search box-->
@endsection
<!--./main content-->
<script>

</script>
@section('page_scripts')
@endsection