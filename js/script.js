

function showPosition() {
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap, showError);
    } else {
        alert("Your browser does not support HTML5 geolocation.");
    }
}
function showMap(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    var latlong = new google.maps.LatLng(lat, long);
    
    var myOptions = {
        center: latlong,
        zoom: 10,
        mapTypeControl: true,
        navigationControlOptions: {
            style:google.maps.NavigationControlStyle.SMALL
        }
        
    }
    
    var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
    var marker = new google.maps.Marker({ position:latlong, map:map});
}

function showError(error) {
    if(error.code == 1) {
        result.innerHTML = "You've decided not to share your position.";
    } else if(error.code == 2) {
        result.innerHTML = "The network is down or the positioning service can't be reached.";
    } 
}


    if(localStorage) {
        jQuery(document).ready(function($) {
            $(".contact-btn").click(function() {
          var name = $("#name").val();
          var email = $("#email").val();
          var subject = $("#subject").val();
          var message = $("message").val();

                localStorage.setItem("full_name", name, "e_mail", email, "subject", subject, "message", message);
                alert("Your information is saved!");
            });
            $(".contact-btn").click(function() {
                alert("Hi, " + localStorage.getItem("full_name"));
            });
        });
    } else {
        alert("Sorry, your browser do not support local storage.");
    }

    function previewImage() {
        var file = document.getElementById("file").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("preview").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }