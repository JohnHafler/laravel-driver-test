$.get("http://freegeoip.net/json/", function (response) {
    $('input[name="user_location[lat]"]').val(response.latitude);
    $('input[name="user_location[lng]"]').val(response.longitude);
}, "jsonp");

$('select[name="country_id"]').add('select[name="region_id"]').on('click', function() {
    var country = $('select[name="country_id"] option:selected').html();
    var region = $('select[name="region_id"] option:selected').html();
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        "address": region + ', ' + country
    }, function (results) {
        $('input[name="route_points[lat]"]').val(results[0].geometry.location.lat());
        $('input[name="route_points[lng]"]').val(results[0].geometry.location.lng());
    });
});
