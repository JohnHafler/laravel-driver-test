@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p class="h1">ADD ORDER</p>
                <form id="add-order" action="add-order" method="post">
                    <input type="hidden" name="key" value="E@3dkCRjzjN9pskGA2~Ya4?mmPgwvI{K82yz">
                    <input type="hidden" name="user_location[lat]" size="50">
                    <input type="hidden" name="user_location[lng]" size="50">
                    <input type="hidden" name="route_points[lat]" size="50">
                    <input type="hidden" name="route_points[lng]" size="50">
                    ID auto:<br>
                    <input type="text" name="car_id" size="50" value="{{ rand(1, 100) }}"><br><br>
                    Country:<br>
                    <select name="country_id">
                        <option value="1">Украина</option>
                        <option value="2">США</option>
                    </select><br><br>
                    Region:<br>
                    <select name="region_id">
                        <option value="1">Днепропетровск</option>
                        <option value="2">Киев</option>
                        <option value="3">Одесса</option>
                        <option value="4">Кривой рог</option>
                        <option value="6">Калифорния</option>
                        <option value="7">Бостон</option>
                    </select><br><br>
                    ID driver:<br>
                    <input type="text" name="id_driver" size="50" value="{{ rand(1, 100) }}"><br><br>
                    <input type="hidden" name="created_at" size="50" value="{{ time() }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/location.js') }}"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6G_Lqqf75Z3Hl8hFwrXGm2tGKl9KVktQ&callback=initMap">
    </script>
@endsection
