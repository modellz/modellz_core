@extends('base_layouts.app1')
<!--main content-->
@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
            <h2 class="pl-2"> Have a nice day!</h2>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <br/>
                            <label for="Email" class="control-label pull-left" style="padding-right: 25px;">Email:</label>
                            <input  type="email" class="form-control" name="email" title="" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label pull-left">Password:</label>
                            <input  type="password" class="form-control" id="password" name="pass" required>
                        </div>
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit"  class="btn btn-primary" style="display: inline;">Let's go</button>
                                <a class="btn btn-link" href="/voting/register" id="IdHai" style="font-size: 12px;display: inline;">
                                    Register
                                </a>
                                /
                                <a class="btn btn-link" href="#" id="IdHai" style="font-size: 12px;display: inline;">Reset Password?
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