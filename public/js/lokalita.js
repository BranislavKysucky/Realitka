$(document).ready(function () {
    function initialize() {
        var options = {
            types: ['(regions)'],
            componentRestrictions: {country: "sk"}
        };
        var input = document.getElementById('lokalita');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        var IsplaceChanged = '';

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            IsplaceChanged = true;
        });

        $("#lokalita").keydown(function () {
            IsplaceChange = false;
        });


        $( "form" ).submit(function( event ) {
            if(IsplaceChanged == true){
                return;
            }else{
                alert("Vyberte jednu z ponúkaných lokalit");
                event.preventDefault();
            }
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
});