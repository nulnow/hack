
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


function onFormSubmit(event) {
    event.preventDefault();
    var cinema = $('#cinema').val();
    var food = $('#food').val();
    var walking = $('#walking').val();
    var coords = $('#real-coords-input').val();

    var body = JSON.stringify({
        cinema,
        food,
        walking,
        coords: JSON.parse(coords)
    });

    axios.post('/update-preferences', {
        cinema,
        food,
        walking,
        coords: JSON.parse(coords)
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(_ => {
        window.location = '/home';
    })

}
$('#mform').submit(onFormSubmit);

function getUserMarker(userLat, userLng) {
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

    var icon = new H.map.Icon(svgYourMarkup, {
        size: {w: 30, h: 30}
    });

    var youserMarker = new H.map.Marker({lat:userLat, lng:userLng},
        {icon});

    return youserMarker;
}

function getCrushMarker(crushLat, crushLng) {
    var svgYourMarkup = `<svg height="512pt" viewBox="0 -35 512.0669 512" 
width="512pt" xmlns="http://www.w3.org/2000/svg">
<path d="m313.855469 411.386719-57.820313 
30.015625-57.820312-30.015625c-34.453125-17.753907-66.644532-39.597657-95.867188-65.058594-69.738281-61.441406-118.199218-145.039063-97.542968-241.257813
 6.65625-34.148437 26.769531-64.1875 55.808593-83.347656 29.042969-19.164062 64.570313-25.835937 
 98.585938-18.523437 47.621093 11.46875 84.933593 48.441406 96.835937 95.957031 11.90625-47.515625
  49.21875-84.488281 96.839844-95.957031 13.914062-3.2109378 28.28125-3.988281 42.460938-2.296875 
  55.765624 7.175781 100.777343 49.058594 111.933593 104.167968 29.308594 136.738282-80.683593 
  247.878907-193.414062 306.316407zm0 0" fill="#c03a2b"/><path d="m450.242188 149.738281c.019531
   82.753907-44.523438 159.109375-116.574219 
   199.824219-72.046875 40.714844-160.4375 39.476562-231.320313-3.234375-69.738281-61.441406-118.199218-145.039063-97.542968-241.257813
    6.65625-34.148437 26.769531-64.1875 55.808593-83.347656 29.042969-19.164062 64.570313-25.835937 98.585938-18.523437 
    47.621093 11.46875 84.933593 48.441406 96.835937 95.957031 11.90625-47.515625 49.21875-84.488281 96.839844-95.957031 
    13.914062-3.2109378 28.28125-3.988281 42.460938-2.296875 35.515624 41.449218 54.996093 94.253906 54.90625 148.835937zm0
     0" fill="#e64c3c"/><path d="m136.351562 23.359375c-30.28125-20.496094-78.089843-2.746094-106.78125 39.648437-28.695312
      42.390626-27.410156 93.375 2.871094 113.871094s78.089844 2.742188 106.78125-39.648437c28.695313-42.394531
       27.410156-93.375-2.871094-113.871094zm0 0" fill="#fb7b76"/><path d="m185.414062
        242.78125c0-12.191406-17.785156-22.070312-39.722656-22.070312s-39.722656 9.878906-39.722656 22.070312c0
         12.1875 17.785156 22.066406 39.722656 22.066406s39.722656-9.878906 39.722656-22.066406zm0 0" 
         fill="#fb7b76"/><path d="m406.105469 242.78125c0-12.191406-17.785157-22.070312-39.722657-22.070312-21.941406 
         0-39.726562 9.878906-39.726562 22.070312 0 12.1875 17.785156 22.066406 39.726562 22.066406 21.9375 0
          39.722657-9.878906 39.722657-22.066406zm0 0" fill="#fb7b76"/><path d="m167.761719 211.882812c-14.628907 
          0-26.484375-11.855468-26.484375-26.480468 0-14.628906 11.855468-26.484375 26.484375-26.484375 14.625 0 
          26.480469 11.855469 26.480469 26.484375 0 14.625-11.855469 26.480468-26.480469 26.480468zm0 0" fill="#2c3e50"/>
          <path d="m344.3125 211.882812c-14.625 0-26.484375-11.855468-26.484375-26.480468 0-14.628906 11.859375-26.484375 
          26.484375-26.484375s26.484375 11.855469 26.484375 26.484375c0 14.625-11.859375 26.480468-26.484375 26.480468zm0 
          0" fill="#2c3e50"/><path d="m256.035156 264.847656c-52.355468 0-52.964844-34.957031-52.964844-35.308594-.046874-4.875 3.867188-8.867187
           8.746094-8.910156 4.875-.046875 8.863282 3.867188 8.910156 8.742188.105469 1.960937 1.984376 17.824218 35.308594 
           17.824218 33.484375 0 35.222656-16.023437 35.3125-17.851562.398438-4.726562 4.289063-8.394531 9.03125-8.519531 
           4.769532.0625 8.609375 3.941406 8.625 8.714843 0 .351563-.609375 35.308594-52.96875 35.308594zm0 0" fill="#802d40"/>
           <g fill="#ecf0f1"><path d="m167.761719 176.574219c0 4.875-3.953125 8.828125-8.828125 8.828125s-8.828125-3.953125-8.828125-8.828125
            3.953125-8.828125 8.828125-8.828125 8.828125 3.953125 8.828125 8.828125zm0 0"/><path d="m185.414062 189.816406c0 7.3125-5.925781
             13.238282-13.238281 13.238282s-13.242187-5.925782-13.242187-13.238282c0-7.316406 5.929687-13.242187 
             13.242187-13.242187s13.238281 5.925781 13.238281 13.242187zm0 0"/><path d="m344.3125 176.574219c0
              4.875-3.953125 8.828125-8.828125 8.828125s-8.828125-3.953125-8.828125-8.828125 3.953125-8.828125 
              8.828125-8.828125 8.828125 3.953125 8.828125 8.828125zm0 0"/><path d="m361.96875 189.816406c0 
              7.3125-5.929688 13.238282-13.242188 13.238282s-13.242187-5.925782-13.242187-13.238282c0-7.316406 
              5.929687-13.242187 13.242187-13.242187s13.242188 5.925781 13.242188 13.242187zm0 0"/>
</g></svg>`;

    var icon = new H.map.Icon(svgYourMarkup, {
        size: {w: 30, h: 30}
    });

    var youserMarker = new H.map.Marker({lat:crushLat, lng:crushLng},
        {icon});

    return youserMarker;
}

if ("geolocation" in navigator) {

    // Инициализация платформы
    var platform = new H.service.Platform({
        'app_id': 'UYyZEbzLwwVbRfjFVEJZ',
        'app_code': 'EdptFMUuf6FTH4l7zrFzxQ'
    });

    var maptypes = platform.createDefaultLayers({lg:"rus"});

    if (document.getElementById('map-me')) {

        var map = new H.Map(
            document.getElementById('map-me'),
            maptypes.normal.map,
            {
                zoom: 10,
                center: { lat: user.options_json.coords.lat, lng: user.options_json.coords.lng }
            });

        var mapEvents = new H.mapevents.MapEvents(map);
        var behavior = new H.mapevents.Behavior(mapEvents);

        var userMarker = getUserMarker(user.options_json.coords.lat, user.options_json.coords.lng);
        map.addObject(userMarker);

        $('#myPlace').click(function (event) {
            event.preventDefault();

            navigator.geolocation.getCurrentPosition(position => {
                console.log(position);

                $('#real-coords-input').val(JSON.stringify(
                    {
                        lat: position.coords.latitude.toString(),
                        lng: position.coords.longitude.toString()
                    }
                ));

                map.removeObject(userMarker);
                userMarker = getUserMarker(position.coords.latitude, position.coords.longitude);
                map.addObject(userMarker);
            });
        });

        map.addEventListener('tap', function(evt) {
            var coord = map.screenToGeo(evt.currentPointer.viewportX,
                evt.currentPointer.viewportY);

            console.log(coord);

            map.removeObject(userMarker);
            userMarker = getUserMarker(coord.lat, coord.lng);
            map.addObject(userMarker);

            $('#real-coords-input').val(JSON.stringify(
                {
                    lat: coord.lat,
                    lng: coord.lng
                }
            ));

            console.log(evt);
            console.log(evt.type, evt.currentPointer.type);
        });
    }

    if (document.getElementById('map')) {

        // Инициализация объекта карты и рендеринг
        var map = new H.Map(
            document.getElementById('map'),
            maptypes.normal.map,
            {
                zoom: 10,
                center: { lng: user.options_json.coords.lat, lat: user.options_json.coords.lng }
            });

        var mapEvents = new H.mapevents.MapEvents(map);
        var behavior = new H.mapevents.Behavior(mapEvents);

        navigator.geolocation.getCurrentPosition(function(position) {

            var userLat = user.options_json.coords.lat;
            var userLng = user.options_json.coords.lng;

            var crushLat = 59.982470;
            var crushLng = 30.348226;

            map.setCenter({lat:userLat, lng:userLng});
            map.setZoom(15);

            var userMarker = getUserMarker(userLat, userLng);
            var crushMarker = getCrushMarker(crushLat, crushLng);

            map.addObject(crushMarker);
            map.addObject(userMarker);

            users.forEach(usersUser => {
                var lt = usersUser.options_json.coords.lat;
                var lg = usersUser.options_json.coords.lng;

                if ( (user.options_json.coords.lat == lt) && (user.options_json.coords.lng == lg) ) {
                    return;
                }
                var marker = new H.map.Marker({lat:lt, lng:lg});
                map.addObject(marker);
            });

            /*
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
        */

        });

    }

} else {
    var div = document.createElement('div');
    div.classList.add('no-geo');
    div.innerText = 'Геолокация недоступна';
    document.body.appendChild(div);
}

