console.log(awpobj.cords1);
function initialize() {
        var mapOptions = {
          center: { lat: +awpobj.cords1 , lng: +awpobj.cords2 },
          zoom: +awpobj.zoom ,
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);