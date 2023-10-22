<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/homeStyle.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     <?php include 'FlightData.php' ?>

    <title>Home</title>
</head>
<body>

    <div class="navbar">
        <div class="user-info">
            <img src="../resources/perfil.png" alt="Foto de Perfil">
            <span>Username</span>
        </div>
        <div class="favMenu">
                <img src="../resources/estrela.png" alt="fav" class="estrelaImg">
                <img src="../resources/menu.png" alt="Ícone do Menu" class="menuImg">
        </div>
    </div>

    <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom">
    </div>

    <div class="pesquisa">
        <img src="../resources/search.png" alt="">
        <input type="text" class="caixaPesquisa" placeholder="O que deseja acompanhar?">
    </div>

    <div class="circulo">
        <img src="../resources/telefone.png" alt="" class="telefoneImg">
    </div>

    <script>
        var icone = L.icon({
            iconUrl: '../resources/plane.png'
            iconSize: [38, 95],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76]
        })

        var map = L.map('map').setView([-25.4372, -49.2700], 13);
        var aircraft = <?php echo json_encode($aircraft); ?>;
    
        var tiles =  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              minZoom: 3,
             attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
         }).addTo(map);

         for (var i = 0; i < aircraft.length; i++) {
            var marker = L.marker([aircraft[i].latitude, aircraft[i].longitude]).addTo(map);
         }
        </script>

</body>
</html>