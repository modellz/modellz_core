@extends('base_layouts.app1')
<!--main content-->
@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
            <h2 class="pl-2">New user Registration !</h2>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <br/>
                            <label for="name" class="control-label pull-left" style="padding-right: 25px;">Name*:</label>
                            <input  type="name" class="form-control" name="u_name" title="" required autofocus >
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
                            <label for="password" class="control-label pull-left">Password*:</label>
                            <input  type="password" class="form-control" name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label pull-left">Re-Enter Password*:</label>
                            <input  type="password" class="form-control" name="r_pass" required>
                        </div>
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit"  class="btn btn-primary" style="display: inline;">Let's go</button>
                                <a class="btn btn-link" href="/voting" id="IdHai" style="font-size: 12px;display: inline;">
                                    Already have an account ? login here!
                                </a>
                                <br/>
                            </div>
                        </div>
                        <br/><br/>
                        <div id="result" style="padding-left:90px;color: red;">{{session('err_msg')}}</div>
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