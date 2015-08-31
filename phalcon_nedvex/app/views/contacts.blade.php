@extends('layouts.main')
@extends('includes.header')
@section('content')
<section class="container contacts">
	<h1 class="h_line">Контакты</h1>
	<div class="map">
		<div class="cordinates">
			<ul>
				<li>
					<span>Адрес</span>
					<span>Сочи, ул. Несебрская, 6, оф. 501<span>
				</li>
				
				<li>
					<span>Телефон, звонок бесплатный</span>
					<span>8 800 100-17-74</span>
				</li>
				<li>
					<span>Электронная почта</span>
					<span>info@nedvex.ru</span>
				</li>
				
			</ul>
		</div>
		<div id="map-canvas" style="width:1180px; height:480px;"></div>
	</div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
var map;
var mapCoordinates = new google.maps.LatLng(43.581975, 39.719215);

function initialize()
{
var mapOptions = {
backgroundColor: "#ffffff", // цвет фона
zoom: 17, // масштаб
disableDefaultUI: true,
draggable: true,
center: mapCoordinates,
mapTypeId: google.maps.MapTypeId.ROADMAP,
//----------- стили ----------
styles: [
  {
    "featureType": "road.highway",
    "stylers": [
      { "color": "#a5a5a5" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "color": "#b4d4ff" }
    ]
  },{
    "featureType": "poi.park",
    "stylers": [
      { "color": "#c2c2c2" }
    ]
  },{
     "featureType": "landscape.man_made",
     
    "stylers": [
       { "hue": "#0019ff" },
       { "lightness": 5 }
    ]
  }
]
//------------конец --------------
};
map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 var marker = new google.maps.Marker({
      position: mapCoordinates,
      map: map,
      title: 'Сочи, ул. Несебрская, 6, оф. 501',
      icon: 'images/map_poin.png'
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop
@extends('includes.footer')  