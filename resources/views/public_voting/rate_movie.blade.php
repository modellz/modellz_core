@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
    <div class="row">
        <div class="container bg-white shadow rounded p-2">
            <div class="row">
                <div class="col-11 col-sm-11 col-md-8 col-lg-8">
                    <iframe class="video-card" title="YouTube video player" allowfullscreen="allowfullscreen" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" src="https://www.youtube.com/embed/{{$movie->Film_Url}}">
                    </iframe>
                </div>
                <div class="col-11 col-sm-11 col-md-5 col-lg-4 float-left">
                    <form method="POST" autocomplete="off">
                        <br/>
                        <div class="form-group mr-2">
                            <label><strong>SELECT A CATEGORY TO VOTE:</strong></label>
                            <select class="form-control select2 w-100" id="IdCategory" name="category" title="selecte a category to vote">
                                <option value="">----select----</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->award_name}}">{{$category->award_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                          <div class="form-check-inline d-flex justify-content-between mx-3" id="IdRating">

                          </div>
                        <div id="IdSelectedCategory">

                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <h5 class="pl-2">Film details :</h5>
            <table class="table table-hover">
                <tr>
                    <td>Movie name</td>
                    <td>: {{$movie->Film_name}}</td>
                </tr>
                <tr>
                    <td>Director name</td>
                    <td>: {{$movie->Director_name}}</td>
                </tr>
                <tr>
                    <td>Producer</td>
                    <td>: {{$movie->Producer}}</td>
                </tr>
                <tr>
                    <td>Script writer</td>
                    <td>: {{$movie->Script_writer}}</td>
                </tr>
                <tr>
                    <td>Music composer</td>
                    <td>: {{$movie->Music_composer}}</td>
                </tr>
                <tr>
                    <td>Cinematographer</td>
                    <td>: {{$movie->Cinematographer}}</td>
                </tr>
                <tr>
                    <td>Production year</td>
                    <td>: {{$movie->Production_year}}</td>
                </tr>
                <tr>
                    <td>Film duration</td>
                    <td>: {{$movie->Film_Duration}}</td>
                </tr>


            </table>
        </div>
    </div>
  <br/>
@endsection
<!--./main content-->
@section('page_scripts')
    <script>
     $(function (e) {
      $('.select2').select2({
          minimumResultsForSearch: -1
      });
      $('#IdCategory').change(function (e) {
          let category=$('#IdCategory :selected').val();
          e.preventDefault();
          $('#IdRating').html('  <div class="form-check" style="display: inline;">\n' +
              '                                  <input class="form-check-input" type="radio" name="Radios" id="Radios1" value="1">\n' +
              '                                  <label class="form-check-label" for="exampleRadios1" style="font-size: 18px;">\n' +
              '                                      1\n' +
              '                                  </label>\n' +
              '                              </div>\n' +
              '                              <div class="form-check" style="display: inline;">\n' +
              '                                  <input class="form-check-input " type="radio" name="Radios" id="Radios2" value="2">\n' +
              '                                  <label class="form-check-label" for="Radios2" style="font-size: 18px;">\n' +
              '                                      2\n' +
              '                                  </label>\n' +
              '                              </div>\n' +
              '                              <div class="form-check" style="display: inline;">\n' +
              '                                  <input class="form-check-input" type="radio" name="Radios" id="Radios3" value="3">\n' +
              '                                  <label class="form-check-label" for="Radios3" style="font-size: 18px;">\n' +
              '                                      3\n' +
              '                                  </label>\n' +
              '                              </div>\n' +
              '                              <div class="form-check" style="display: inline;">\n' +
              '                                  <input class="form-check-input" type="radio" name="Radios" id="Radios4" value="4">\n' +
              '                                  <label class="form-check-label" for="Radios4" style="font-size: 18px;">\n' +
              '                                      4\n' +
              '                                  </label>\n' +
              '                              </div>\n' +
              '                              <div class="form-check" style="display: inline;">\n' +
              '                                  <input class="form-check-input" type="radio" name="Radios" id="Radios5" value="5">\n' +
              '                                  <label class="form-check-label" for="Radios5" style="font-size: 18px;">\n' +
              '                                      5\n' +
              '                                  </label>\n' +
              '                              </div>');
          $('#IdSelectedCategory').html('<br/><div class="alert alert-success alert-dismissible"> ' +
              '<strong>'+ category+'</strong></div>');
      });
         $(document).on('change','.form-check-input',function (e) {
             e.preventDefault();
             let category=$('#IdCategory :selected').val();
             let rating=$("input[name='Radios']:checked").val();
             if(category===''){
                 alert('Kindly select any category');
             }
             else {
                 $('#IdSelectedCategory').html('<br/><div class="alert alert-success alert-dismissible"> ' +
                     '<strong>'+ category+' : '+rating+'</strong>--<button type="submit" id="IdRatingSubmit" class="btn btn-primary"> Submit</button></div>');
             }
         });

         $(document).on('click','#IdRatingSubmit',function (e) {
            e.preventDefault();
             let category=$('#IdCategory :selected').val();
             let rating=$("input[name='Radios']:checked").val();
            alert('Rated Successfully !'+category+' - '+rating)
         });

     });
    </script>
@endsection