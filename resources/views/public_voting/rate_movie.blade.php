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
                    </iframe><br>
                    <div id="player"></div>
                    <div class="mx-auto">
                        @if($movie->id>1)
                            <a href="/public/sfa/movies/{{$movie->id-1}}" ><button class="btn btn-success">< Previous</button></a>
                        @endif
                        <a href="/public/sfa/movies/{{$movie->id+1}}"><button class="btn btn-success">Next ></button></a>
                    </div>
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
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '390',
                width: '640',
                videoId: 'M7lc1UVf-VE',
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
    </script>
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
          $('#IdSelectedCategory').html('<br/><div class="alert alert-warning alert-dismissible"> ' +
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
                 let csrf=$('#IdCsfrFetch').attr('content');
                 $.ajax({
                     url:'{{route('public.vote.store')}}',
                     type:'POST',
                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     data:{category:category,votes:rating,b_id:'{{$movie->id}}'},
                     success:function (result) {
                         $("#IdLoading").modal('hide');
                         $('#IdSelectedCategory').html(result);
                     },
                     error: function(result){
                         $("#IdLoading").modal('hide');
                         let errors = result.responseJSON['message'];
                         $('#IdSelectedCategory').html('<div class="alert alert-danger alert-dismissible"> ' +
                             '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' +
                             '<ul> ' +errors+
                             '</ul> </div> '
                         );
                         // Render the errors with js ...
                     }
                 });
               }//else end
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