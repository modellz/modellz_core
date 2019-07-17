@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
            <h3 class="pl-2">New user Registration !</h3>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="/public/register" autocomplete="off">
                        {{ csrf_field() }}
                        @if(session('err_msg'))
                        <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('err_msg')}}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name" class="control-label pull-left" style="padding-right: 25px;">Name*:</label>
                            <input  type="text" class="form-control" name="u_name" title="" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="Email" class="control-label pull-left" style="padding-right: 25px;">Email*:</label>
                            <input  type="email" class="form-control" name="email" title="" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label pull-left" style="padding-right: 25px;">Phone*:</label>
                            <input  type="text" class="form-control" name="phone" title="" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="City" class="control-label pull-left" style="padding-right: 25px;">City*:</label>
                            <input  type="text" class="form-control" name="city" title="" required autofocus >
                        </div>

                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit"  class="btn btn-primary" style="display: inline;">Let's go</button>
                                <a class="btn btn-link" href="/public/login" id="IdHai" style="font-size: 13px;display: inline;">
                                    Already have an account ? login here!
                                </a>
                                <br/>
                            </div>
                        </div>
                        <br/>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
<!--./main content-->
@section('page_scripts')
    <script>

    </script>
@endsection