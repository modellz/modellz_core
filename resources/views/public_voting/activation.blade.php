@extends('base_layouts.app2')
<!--main content-->
@section('content')
    <div class="row" style="min-height: 90vh;">
        <div class="col-md-4 col-lg-4 col-sm-10 col-10 mx-auto login-div" style="margin-top: 40px;">
            <div class="container" id="IdMyResults"></div>
            <div class="card shadow" id="IdAddCardBody" style="border-radius: 10px;">
                <div id="IdSelectBody" class="card-body">
                    <div class="card-header">
                        Choose activation method !
                    </div>
                    <br/>
                        <div class="form-group">
                            <button id="IdPublicChooseBtnSms" class="btn btn-primary shadow"> Activate using mobile OTP </button>
                        </div>
                 <!--   <div class="form-group">
                        <button id="IdPublicChooseBtnEmail" class="btn btn-warning shadow pr-4"> Activate using Email  Link </button>
                    </div>-->
                        <br/>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--./main content-->
@section('page_scripts')
    <script>
        $(function (e) {
            let smsbody=' <div id="IdOtpBody" class="card-body">\n' +
                '<form role="form" method="POST" action="/public/register/otp" autocomplete="off">\n' +
                '<div class="form-group">\n' +
                '                            <label for="u_name" class="control-label pull-left" style="padding-right: 25px;">Enter OTP to activate :</label>\n' +
                '                            <input  type="text" class="form-control" name="otp" id="IdPublicOtp" required autofocus >\n' +
                '                            <input  type="hidden" class="form-control" name="_token" id="IdPublicToken"  value="">\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <div class="float-left">\n' +
                '                                <button type="submit"  class="btn btn-primary" id="IdOtpSubmit" style="display: inline;">Submit</button>\n' +
                '                                <a class="btn btn-link" href="#" id="IdPublicResendSms" style="font-size: 13px;display: inline;">\n' +
                '                                   Resend OTP \n' +
                '                                </a>\n' +
                '                                <br/>\n' +
                '                            </div>\n' +
                '                        </div><br/>\n' +
                '                    </form>\n' +
                '                </div>';


             //sms choose btn
            $(document).on('click','#IdPublicResendSms',function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/public/register/otp/resend',
                    type: 'POST',
                    data: {_token:'{{csrf_token()}}'},
                    beforeSend: function(){
                        $("#IdLoading").modal('show');
                    },
                    success: function (result) {
                        $('#IdMyResults').html('<div class="alert alert-success m-2 p-3">Resend Done !</div>'+result);
                        $('#IdPublicToken').val('{{csrf_token()}}');
                        $("#IdLoading").modal('hide');
                    }
                });
            });

            //sms choose btn
            $('#IdPublicChooseBtnSms').click(function (e) {
                e.preventDefault();
                $('#IdPublicChooseBtnSms').addClass('disabled');
                $.ajax({
                    url: '/public/register/otp/resend',
                    type: 'POST',
                    data: {_token:'{{csrf_token()}}'},
                    beforeSend: function(){
                        $("#IdLoading").modal('show');
                    },
                    success: function (result) {
                        $('#IdSelectBody').remove();
                        $('#IdMyResults').html(result);
                        $('#IdAddCardBody').html(smsbody);
                        $('#IdPublicToken').val('{{csrf_token()}}');
                        $("#IdLoading").modal('hide');
                    }
                });
            });

            //email choose btn
            $('#IdPublicChooseBtnEmail').click(function (e) {
                e.preventDefault();
                $('#IdPublicChooseBtnEmail').addClass('disabled');
                $.ajax({
                    url: '/public/register/mail/resend',
                    type: 'POST',
                    data: {_token:'{{csrf_token()}}'},
                    beforeSend: function(){
                        $("#IdLoading").modal('show');
                    },
                    success: function (result) {
                        $('#IdAddCardBody').remove();
                        $('#IdMyResults').html(result);
                        $("#IdLoading").modal('hide');
                    }
                });
            });
        });
    </script>
@endsection