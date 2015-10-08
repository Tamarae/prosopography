      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(41.690254, 44.812575),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
