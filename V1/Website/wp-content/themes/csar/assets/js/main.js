jQuery("document").ready(function() {
    if(document.getElementById("map") !== null) {
        var map = new OpenLayers.Map("map");
        
        const fromProjection    = new OpenLayers.Projection("EPSG:4326");
        const toProjection      = new OpenLayers.Projection("EPSG:900913");
        const position          = new OpenLayers.LonLat(locationLog, locationLat).transform(fromProjection, toProjection)
        const zoom              = 15;

        var markers             = new OpenLayers.Layer.Markers( "Markers" );
        markers.addMarker(new OpenLayers.Marker(position))

        controls = map.getControlsByClass('OpenLayers.Control.Navigation');
        for(var i = 0; i < controls.length; ++i) {
            controls[i].disableZoomWheel();
        }

        map.addLayer(new OpenLayers.Layer.OSM());
        map.addLayer(markers);
        map.setCenter(position, zoom);
    }
})