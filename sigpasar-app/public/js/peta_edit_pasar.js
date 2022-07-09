var edit_lat = $("#id_latitude").val();
var edit_long = $("#id_longitude").val();

getData_peta();
function getData_peta(){
 
   document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 400px;'><button type='button' onclick='getLocation()' style='position: absolute; top: 10px; right: 10px; padding: 5px; z-index: 1000; cursor: pointer;' > Gunakan Lokasi Saya</button></div>";

   var curLocation=[edit_lat, edit_long];
  if (curLocation[0]==0 && curLocation[1]==0) {
    curLocation =[-8.58280355011038, 116.13464826731037]; 
  }

  var mymap = L.map('data_peta').setView([edit_lat, edit_long], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Sistem Informasi Pemetaan Lokasi Pasar Tradisional di Kota Mataram',
    id: 'mapbox/streets-v11',
  }).addTo(mymap);

  mymap.attributionControl.setPrefix(false);
  var marker = new L.marker(curLocation, {
    draggable:'true'
  });

  marker.on('dragend', function(event) {
  var position = marker.getLatLng();
  marker.setLatLng(position,{
    draggable : 'true'
    }).bindPopup(position).update();
    $("#id_latitude").val(position.lat);
    $("#id_longitude").val(position.lng).keyup();
    // console.log(position.lat, position.lng)
    // alert('Titik lokasi berhasil di tambahkan!');
  });

  $("#Latitude, #Longitude").change(function(){
    var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
    marker.setLatLng(position, {
    draggable : 'true'
    }).bindPopup(position).update();
    mymap.panTo(position);
  });
  mymap.addLayer(marker);
}


function getLocation() {

  navigator.geolocation.getCurrentPosition(function(location) {
      var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

      //map view 
      console.log(location.coords.latitude, location.coords.longitude);

      document.getElementById("id_latitude").value = location.coords.latitude;
      document.getElementById("id_longitude").value = location.coords.longitude;

    });
    alert('Titik lokasi berhasil di tambahkan!');
}
