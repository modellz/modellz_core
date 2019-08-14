@extends('base_layouts.app2')
<!--main content-->
@section('content')
    <div class="row" style="min-height: 90vh;">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mx-auto" style="padding-top: 60px;">
            <h3 class="pl-2"> Sign in !</h3>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="/public/logme">
                        {{ csrf_field() }}
                        @if(session('err_msg'))
                            <div id="result" class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('err_msg')}}
                            </div>
                        @endif
                        @if(session('success_msg'))
                        <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('success_msg')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="u_name" class="control-label pull-left" style="padding-right: 25px;font-weight: bold;">Mobile no:</label>
                            <input  type="number" class="form-control" name="u_name" pattern="[6789][0-9]{9}" title="" required autofocus >
                        </div>
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit"  class="btn btn-primary" style="display: inline;">Log in</button>
                                <a class="btn btn-link" href="/public/register" id="IdHai" style="font-size: 14px;display: inline;">
                                    Register Here !
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