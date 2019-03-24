
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
    var name = $('#name').val();


    var gender = 'n';

    if ($('#genderM').prop('checked')) {
        gender = 'm';
    }

    if ($('#genderF').prop('checked')) {
        gender = 'f';
    }

    if ($('#genderN').prop('checked')) {
        gender = 'n';
    }

    var lookingFor = 'a';

    if ($('#lookingForM').prop('checked')) {
        lookingFor = 'm';
    }

    if ($('#lookingForF').prop('checked')) {
        lookingFor = 'f';
    }

    if ($('#lookingForA').prop('checked')) {
        lookingFor = 'a';
    }

    axios.post('/update-preferences', {
        cinema,
        food,
        walking,
        coords,
        gender,
        lookingFor,
        name,
        coords: JSON.parse(coords)
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(response => {
        console.log(response)
        window.location = '/home';
    }).catch(error => {
        console.log('error')
        console.log(error)
    });

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
    var svgYourMarkup = `https://image.flaticon.com/icons/svg/742/742751.svg`;

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

        var piterLat = 59.929896;
        var piterLng = 30.314401;

        var map = new H.Map(
            document.getElementById('map'),
            maptypes.normal.map,
            {
                zoom: 11,
                center: { lat: piterLat, lng: piterLng }
            });

        var mapEvents = new H.mapevents.MapEvents(map);
        var behavior = new H.mapevents.Behavior(mapEvents);

        var userLat = user.options_json.coords.lat;
        var userLng = user.options_json.coords.lng;

        var crushLat = pairLat;
        var crushLng = pairLng;

        var userMarker = getUserMarker(userLat, userLng);
        var crushMarker = getCrushMarker(crushLat, crushLng);

        map.addObject(crushMarker);
        map.addObject(userMarker);

        var search = new H.places.Search(platform.getPlacesService());

        if (!whereToGo.title)
            search.request({
                'q': whereToGo,
                'at': `${piterLat},${piterLng}`
            }, {}, result => {
                var item = result.results.items[0];
                console.log(item);
                var lt = item.position[0];
                var lg = item.position[1];

                var marker = new H.map.Marker({lat:lt, lng:lg});
                map.addObject(marker);
                $('#place').html(item.title);
                $('#sendInviteButton').click(event => {
                    event.preventDefault();

                    axios.post('/send-invite/'+userGettingInvitedId, {
                        lat: item.position[0],
                        lng: item.position[1],
                        title: item.title
                    }, {})
                        .then(response => {
                            window.location = '/home'
                        })
                        .catch(error => {
                            console.log(error);
                        });

                    //
                    //         response => {
                    //     console.log(response)
                    // }, error => {
                    //     console.log(error)
                    // })
                });

            }, error => {
                console.log(error);
            });
        else {
            var lt = whereToGo.lat;
            var lg = whereToGo.lng;

            var marker = new H.map.Marker({lat:lt, lng:lg});
            map.addObject(marker);
        }


            /*
            ,
                searchResult, error;

            // Define search parameters:
            var params = ;

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

        */

    }

} else {
    var div = document.createElement('div');
    div.classList.add('no-geo');
    div.innerText = 'Геолокация недоступна';
    document.body.appendChild(div);
}

