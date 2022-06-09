$(document).ready(function() {
    $(document).on('change', '#sort-property', function(e) {
        $(this).parents('form').submit();
    });

    $('.search-state').on('change', function() {
        var name = $(this).val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');

        if (name == "") {
            $("." + dependent).html('<option value="">Select City</option>');
        } else {
            var select = $(this).attr('id');
            $.ajax({
                url: "get-city",
                method: "POST",
                async: false,
                data: { name: name, select: select },
                success: function(result) {
                    console.log(dependent)
                    $("." + dependent).html(result);
                    $('.' + dependent).val(val);
                },
            })
        }
    })
    $('.search-state').trigger('change');

    var geocoder;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }

    function successFunction(position) {

        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        codeLatLng(lat, lng)
    }

    function errorFunction() {
        alert("Geocoder failed");
    }

    function initialize() {
        geocoder = new google.maps.Geocoder();
    }

    function codeLatLng(lat, lng) {

        var latlng = new google.maps.LatLng(lat, lng);
        geocoder.geocode({ 'latLng': latlng }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $('.city-btn').html(results[0].address_components[3].long_name + ' <i class="fa fa-arrow-circle-down"></i>');
                console.log(results)
                if ($('.city-btn').html()) {
                    $.ajax({
                        url: "get-featured",
                        method: "POST",
                        async: false,
                        data: { city: results[0].address_components[3].long_name },
                        success: function(result) {
                            $(".featured-prop").html(result);
                        },
                    })
                }
                /*if (results[1]) {
                 
                 alert(results[0].formatted_address)
            
                    for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {

            
                        if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
            
                            city= results[0].address_components[i];
                            break;
                        }
                    }
                }
            
                alert(city.short_name + " " + city.long_name)

                } else {
                  alert("No results found");
                }*/
            } else {
                return false;
            }
        });
    }

    initialize()
    $(".city-btn, .city-home").mouseenter(function() {
        $(".city-home").addClass("show1");
    });

    $(".city-btn, .city-home").mouseleave(function() {
        $(".city-home").removeClass("show1");
    });

    if ($('#no-propety').val() != undefined) {
        swal({
            title: "No Property Found",
            text: "Sorry for the inconvenience. Chekout Our featured properties.",
            icon: "error",
            button: "OK",
        });
    }
})