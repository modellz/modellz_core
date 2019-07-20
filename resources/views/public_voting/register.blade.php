@extends('base_layouts.app2')
<!--main content-->
@section('content')
    <div class="row" style="min-height: 90vh;">
        <div class="container" id="IdMyResults"></div>
        <div id="IdCreateErrors"></div>
        <div id="IdRegisterBlock" class="col-md-4 col-lg-4 col-sm-12 col-12 mx-auto" >
            <h3 class="pl-2">New user Registration !</h3>
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <form role="form" id="IdPublicRegisterForm" method="POST" action="/public/register" autocomplete="off">
                        {{ csrf_field() }}
                        <div id="IdCreateErrors"></div>
                        <div id="IdMyResults"></div>
                        <div class="form-group">
                            <label for="name" class="control-label pull-left" style="padding-right: 25px;">Name*:</label>
                            <input  type="text" class="form-control" pattern="[A-Za-z]{2,}" name="u_name" title="Enter Valid name" placeholder="User name" value="{{ old('u_name')}}"  required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="Email" class="control-label pull-left" style="padding-right: 25px;">Email*:</label>
                            <input  type="email" class="form-control{{ $errors->has('email') ? ' has-error' : ''}}" name="email" placeholder="Email" title="Enter valid email address" value="{{ old('email')}}" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label pull-left"  style="padding-right: 25px;">Mobile*:</label>
                            <input  type="text" class="form-control {{ $errors->has('email') ? ' has-error' : ''}}" name="phone" pattern="[6789][0-9]{9}" maxlength="10" title="Enter 10 digit mobile number" placeholder="Example: 7900083000" value="{{ old('phone')}}" required autofocus >
                        </div>
                        <div class="form-group">
                            <label for="Location" class="control-label pull-left" style="padding-right: 25px;">Location*:</label>
                            <input  type="text" class="form-control" name="location" placeholder="Location" title="Enter valid Location" value="{{ old('location')}}" required autofocus>
                        </div>
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit"  id="IdPublicRegisterSubmit" class="btn btn-primary" style="display: inline;">Let's go</button>
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
        $(function (e) {
            function commonajax(urls,el,hider){
                $.ajax({
                    url: urls,
                    type: 'POST',
                    data:new FormData(el),
                    contentType:false,
                    processData:false,
                    beforeSend: function(){
                        $("#IdLoading").modal('show');
                    },
                    success:function(result)
                    {
                        $('#'+hider).remove();
                        $('#IdMyResults').html(result);
                        $("#IdLoading").modal('hide');

                    },
                    error: function(result){
                        var errors = result.responseJSON;
                        var errorsHtml = '';
                        $.each(errors.errors, function( key, value ) {
                            errorsHtml += '<li>'+value[0]+'</li> ';
                        });
                        $("#IdLoading").modal('hide');
                        $('#IdCreateErrors').html('<div class="alert alert-danger alert-dismissible"> ' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' +
                            '<ul> ' +errorsHtml +
                            '</ul> </div> ');
                        // Render the errors with js ...
                    }
                });//ajax
            }
            $('#IdPublicRegisterForm').on('submit',function (e) {
               e.preventDefault();
               $('#IdPublicRegisterSubmit').addClass('disabled');
               commonajax('/public/register',this,'IdRegisterBlock');
            });


             /**
            $('#IdPublicResend').on('click',function (e) {
                e.preventDefault();
                $('#IdPublicRegisterSubmit').addClass('disabled');
                commonajax('/public/register',this,'IdRegisterBlock');
            });
              **/

        });
    </script>
@endsection