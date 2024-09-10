document.addEventListener("DOMContentLoaded", function(event) {

    var greenIcon = new L.Icon({
        iconUrl: '/common/cdn/map_images/marker-icon-green.png',
        shadowUrl: '/common/cdn/map_images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    let center = [48.32136917139583, 21.56666973293446];
    const map = L.map("map").setView(center, 17);



    const layersControl = L.control.layers().addTo(map);
    const universityOfTokajGroup = new L.FeatureGroup().addTo(map);

    let OpenStreetMap = L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 18,
            attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }
    ).addTo(map);
    L.control.layers(
        {
            'OSM': OpenStreetMap,
            'Google': L.tileLayer(
                'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}',
                {
                    attribution: 'Google'
                }
            )
        },
        {
            'University of Tokaj': universityOfTokajGroup
        },
        {
            position: 'topleft',
            collapsed: false
        }
    ).addTo(map);


    /*L.marker([48.321281, 21.565936], {icon: greenIcon}).addTo(map)
        .bindPopup(`
            <strong>University of Tokaj</strong><br/>
            Main entrance
        `)
        .openPopup();


    let marker = L.marker(
        [
            parseFloat(48.321698),
            parseFloat(21.566739)
        ],
        {icon: greenIcon}
    );
    marker.bindPopup(`
        <strong>CoffeHouse</strong><br/>
        Main entrance
    `).openPopup();
    universityOfTokajGroup.addLayer(marker);

    marker = L.marker(
        [
            parseFloat(48.32192),
            parseFloat(21.566779)
        ],
        {icon: greenIcon}
    );
    marker.bindPopup(`
        <strong>Cultural center</strong><br/>
        Main entrance
    `).openPopup();
    universityOfTokajGroup.addLayer(marker);

    marker = L.marker(
        [
            parseFloat(48.321392),
            parseFloat(21.56503)
        ],
        {icon: greenIcon}
    );
    marker.bindPopup(`
        <strong>Hotel Furmint ***</strong><br/>
        Main entrance
    `).openPopup();
    universityOfTokajGroup.addLayer(marker);*/




    map.on('click', onMapClick);
    /*handleGeoJSON(geojson_data_hungary_boundary, 'Hungary border');
    handleGeoJSON(geojson_data_hungary_states, 'Hungary states');*/

    /*var imageUrl = 'https://mlthesis.artidas.hu/Map_BASE_V1/javascript/magyarorszag_borvidekei_2010.jpg',
    imageBounds = [
        [48.74048, 15.944797],
        [45.446738, 23.059333]
    ];
    const image_layer = L.imageOverlay(imageUrl, imageBounds).addTo(map);
    image_layer.setOpacity(0.5);
    image_layer.addTo(map);
    layersControl.addOverlay(image_layer, 'Hungarian wine regions');*/

    function onMapClick(e) {
        document.getElementById('map_log').innerHTML += 'Click at: ' + e.latlng + '<br/>';
    }
    
    function handleGeoJSON(data_variable, data_name) {
        const existing_Layer = findLayerByName(data_name);

        if (existing_Layer) {
            map.removeLayer(existing_Layer);
        }

        const geoJsonLayer = L.geoJSON(data_variable, {
            onEachFeature: function (feature, layer) {
                // You can customize the interaction with each feature if needed
            }
        });

        geoJsonLayer.addTo(map);

        layersControl.addOverlay(geoJsonLayer, data_name);
    }

    function findLayerByName(name) {    
        map.eachLayer(function (layer) {
            if (layer instanceof L.GeoJSON && layer.options.name === name) {
                return layer;
            }
        });
    
        return null;
    }
});