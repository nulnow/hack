
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

if ("geolocation" in navigator) {

    if (document.getElementById('map')) {

        // Инициализация платформы
        var platform = new H.service.Platform({
            'app_id': 'UYyZEbzLwwVbRfjFVEJZ',
            'app_code': 'EdptFMUuf6FTH4l7zrFzxQ'
        });

        // Получение списка базовых карт
        var maptypes = platform.createDefaultLayers({lg:"rus"});

        // Инициализация объекта карты и рендеринг
        var map = new H.Map(
            document.getElementById('map'),
            maptypes.normal.map,
            {
                zoom: 10,
                center: { lng: 37.620, lat: 55.751 }
            });

        var mapEvents = new H.mapevents.MapEvents(map);
        var behavior = new H.mapevents.Behavior(mapEvents);

        navigator.geolocation.getCurrentPosition(function(position) {

            var userLat = 59.987273;
            var userLng = 30.342650;

            var crushLat = 59.982470;
            var crushLng = 30.348226;

            map.setCenter({lat:userLat, lng:userLng});
            map.setZoom(15);

            var svgYourMarkup = `<svg width="443" height="395" xmlns="http://www.w3.org/2000/svg">
                 <!-- Created with Method Draw - http://github.com/duopixel/Method-Draw/ -->
                 <g>
                  <title>background</title>
                  <rect fill="#ffffff" id="canvas_background" height="397" width="445" y="-1" x="-1"/>
                  <g display="none" overflow="visible" y="0" x="0" height="100%" width="100%" id="canvasGrid">
                   <rect fill="url(#gridpattern)" stroke-width="0" y="0" x="0" height="100%" width="100%"/>
                  </g>
                 </g>
                 <g>
                  <title>Layer 1</title>
                  <ellipse stroke="#000" ry="187.499995" rx="208.500006" id="svg_2" cy="195.437495" cx="223.500006" stroke-width="21" fill="#fff"/>
                  <text font-weight="bold" transform="rotate(0.20366555452346802 216.75000000001756,203.4375000000032) " xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="229" id="svg_1" y="282.4375" x="9.5" stroke-width="9" stroke="#000" fill="#e91e63">You</text>
                 </g>
                </svg>`;

            var svgCrushMarkup = `<svg width="443" height="395" xmlns="http://www.w3.org/2000/svg">
                 <!-- Created with Method Draw - http://github.com/duopixel/Method-Draw/ -->
                 <g>
                  <title>background</title>
                  <rect fill="#ffffff" id="canvas_background" height="397" width="445" y="-1" x="-1"/>
                  <g display="none" overflow="visible" y="0" x="0" height="100%" width="100%" id="canvasGrid">
                   <rect fill="url(#gridpattern)" stroke-width="0" y="0" x="0" height="100%" width="100%"/>
                  </g>
                 </g>
                 <g>
                  <title>Layer 1</title>
                  <ellipse stroke="#000" ry="187.499995" rx="208.500006" id="svg_2" cy="195.437495" cx="223.500006" stroke-width="21" fill="#fff"/>
                  <text font-weight="bold" transform="rotate(0.20366555452346802 216.75000000001756,203.4375000000032) " xml:space="preserve" text-anchor="start" font-family="Helvetica, Arial, sans-serif" font-size="229" id="svg_1" y="282.4375" x="9.5" stroke-width="9" stroke="#000" fill="#e91e63">You</text>
                 </g>
                </svg>`;

            var icon = new H.map.Icon(svgYourMarkup, {
                size: {w: 30, h: 30}
            });

            var youserMarker = new H.map.Marker({lat:userLat, lng:userLng},
                {icon});

            var crushIcon = new H.map.Icon(svgYourMarkup, {
                size: {w: 30, h: 30}
            });

            var crushMarker = new H.map.Marker(
                {
                    lat: crushLat,
                    lng: crushLng
                },
                {icon}
            );


            map.addObject(crushMarker);
            map.addObject(youserMarker);


            var search = new H.places.Search(platform.getPlacesService()),
                searchResult, error;

            // Define search parameters:
            var params = {
                // Plain text search for places with the word "hotel"
                // associated with them:
                'q': 'cafe',
                //  Search in the Chinatown district in San Francisco:
                'at': `${userLat},${userLng}`
            };

            // Define a callback function to handle data on success:
            function onResult(data) {
                exploreResult = data;
                console.log(data);
                data.results.items.forEach(item => {
                    var lt = item.position[0];
                    var lg = item.position[1];


                    var marker = new H.map.Marker({lat:lt, lng:lg});
                    map.addObject(marker);
                });

                var item = data.results.items[0].position;

                // Create the parameters for the routing request:
                var routingParameters = {
                    // The routing mode:
                    'mode': 'fastest;car',
                    // The start point of the route:

                    'waypoint0': `geo!${userLat},${userLng}`,
                    // The end point of the route:
                    'waypoint1': `geo!${item[0]},${item[1]}`,
                    // To retrieve the shape of the route we choose the route
                    // representation mode 'display'
                    'representation': 'display'
                };

                // Define a callback function to process the routing response:
                var onResult = function(result) {

                    var route,
                        routeShape,
                        startPoint,
                        endPoint,
                        linestring;
                    if(result.response.route) {
                        // Pick the first route from the response:
                        route = result.response.route[0];
                        // Pick the route's shape:
                        routeShape = route.shape;

                        // Create a linestring to use as a point source for the route line
                        linestring = new H.geo.LineString();

                        // Push all the points in the shape into the linestring:
                        routeShape.forEach(function(point) {
                            var parts = point.split(',');
                            linestring.pushLatLngAlt(parts[0], parts[1]);
                        });

                        // Retrieve the mapped positions of the requested waypoints:
                        startPoint = route.waypoint[0].mappedPosition;
                        endPoint = route.waypoint[1].mappedPosition;

                        // Create a polyline to display the route:
                        var routeLine = new H.map.Polyline(linestring, {
                            style: { strokeColor: 'blue', lineWidth: 10 }
                        });

                        // Create a marker for the start point:
                        var startMarker = new H.map.Marker({
                            lat: startPoint.latitude,
                            lng: startPoint.longitude
                        });

                        // Create a marker for the end point:
                        var endMarker = new H.map.Marker({
                            lat: endPoint.latitude,
                            lng: endPoint.longitude
                        });

                        // Add the route polyline and the two markers to the map:
                        map.addObjects([routeLine, startMarker, endMarker]);

                        // Set the map's viewport to make the whole route visible:
                        map.setViewBounds(routeLine.getBounds());
                    }
                };

                // Get an instance of the routing service:
                var router = platform.getRoutingService();

                // Call calculateRoute() with the routing parameters,
                // the callback and an error callback function (called if a
                // communication error occurs):
                router.calculateRoute(routingParameters, onResult,
                    function(error) {
                        alert(error.message);
                    });
            }

            // Define a callback function to handle errors:
            function onError(data) {
                error = data
                console.log(data)
            }

            // Run a search request with parameters, headers (empty), and callback functions:
            search.request(params, {}, onResult, onError);

        });

    }

} else {
    var div = document.createElement('div');
    div.classList.add('no-geo');
    div.innerText = 'Геолокация недоступна';
    document.body.appendChild(div);
}

