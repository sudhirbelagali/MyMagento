//External resources:
//http://maps.google.com/maps/api/js?sensor=false
//https://google-maps-utility-library-v3.googlecode.com/svn-history/r391/trunk/markerwithlabel/src/markerwithlabel.js


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
<script>
function init() {
  
  var mapOptions = {
      zoom: 8,
      center: new google.maps.LatLng(40.417181, -3.700823),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true
  };
  
  var myMap = new google.maps.Map(document.getElementById('myMap'), mapOptions);
  
  var marker = new MarkerWithLabel({
    position: myMap.getCenter(),
    icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 0, //tamaño 0
    },
    map: myMap,
    draggable: true,
    labelAnchor: new google.maps.Point(10, 10),
    labelClass: "label", // the CSS class for the label
  });
}
google.maps.event.addDomListener(window, 'load', init);

</script>

