@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p class="h1">YOUR COORDINATES</p>
                <form id="get-map-info" action="get-map-info" method="get">
                    <input type="hidden" name="key" value="E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz">
                    <input type="text" name="user_location[lat]" size="50"><br>
                    <input type="text" name="user_location[lng]" size="50"><br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.get("http://freegeoip.net/json/", function (response) {
            $('input[name="user_location[lat]"]').val(response.latitude);
            $('input[name="user_location[lng]"]').val(response.longitude);
        }, "jsonp");    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6G_Lqqf75Z3Hl8hFwrXGm2tGKl9KVktQ&callback=initMap">
    </script>
@endsection
