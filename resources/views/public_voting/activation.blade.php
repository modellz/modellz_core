@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    <div class="row">
        <div class="container" id="IdMyResults"></div>
        <div class="col-md-4 col-lg-4 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
            @if(session('err_msg'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               {{session('err_msg')}}
            </div>
            @endif
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" method="POST" action="/public/register/otp">
                        <div class="form-group">
                            <label for="u_name" class="control-label pull-left" style="padding-right: 25px;">Enter OTP to activate using mobile number :</label>
                            <input  type="text" class="form-control" name="otp" required autofocus >
                        </div>
                        <div class="form-group">

                            <div class="float-left">
                                <button type="submit"  class="btn btn-primary" style="display: inline;">Submit</button>
                                <a class="btn btn-link" href="#" id="IdPublicResendSms" style="font-size: 13px;display: inline;">
                                   Resend OTP
                                </a>|
                                <a class="btn btn-link" href="#" id="IdPublicResendEmail" style="font-size: 13px;display: inline;">
                                   Resend Email activation link
                                </a>
                                <br/>
                            </div>
                        </div><br/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--./main content-->
@section('page_scripts')
    <script>
        $(function (e) {
            function commonajax(urls,el,hider){
                $.ajax({
                    url: urls,
                    type: 'POST',
                    data:new FormData(el),
                    contentType:false,
                    processData:false,
                    success:function(result)
                    {
                        $('#'+hider).remove();
                        $('#IdMyResults').html(result);
                    },
                    error: function(result){
                        var errors = result.responseJSON;
                        var errorsHtml = '';
                        $.each(errors.errors, function( key, value ) {
                            errorsHtml += '<li>'+value[0]+'</li> ';
                        });
                        $('#IdCreateErrors').html('<div class="alert alert-danger alert-dismissible"> ' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' +
                            '<ul> ' +errorsHtml +
                            '</ul> </div> ');
                        // Render the errors with js ...
                    }
                });//ajax
            }

            $('#IdPublicResend').on('click',function (e) {
                e.preventDefault();
                $('#IdPublicRegisterSubmit').addClass('disabled');
                $.ajax({
                    url: '/public/resend/sms',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        $('#' + hider).remove();
                        $('#IdMyResults').html(result);
                    }
                });

                });

        });
    </script>
@endsection