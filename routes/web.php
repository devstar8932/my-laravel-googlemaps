<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $config['center'] = 'Air Canada Centre,Toronto';
    $config['zoom'] = '16';
    $config['map_height'] = '500px';
    $config['geocodeCaching'] = true;
    //$config['map_width'] = '500px';
    $config['scrollwheel'] = false;

    GMaps::initialize($config);

    // Add Market
    $marker['position'] = 'Air Canada Centre,Toronto';
    $marker['infowindow_content'] = 'Air Canada Centre';
    $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_spin&chld=1.5|0|0afc57|12|_|HO';
    GMaps::add_marker($marker);

    // Add Market
    $marker['position'] = 'CN Tower,Toronto';
    $marker['infowindow_content'] = 'CN Tower';
    $marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/grn-blank.png';
    GMaps::add_marker($marker);

    $circle['center'] = 'Union Station, Toronto';
    $circle['radius'] = '100';
    GMaps::add_circle($circle);

    $map = GMaps::create_map();
    return view('welcome')->with('map',$map);
});


Route::get('/directions', function () {
    $config['center'] = 'Air Canada Centre,Toronto';
    $config['zoom'] = '14';
    $config['map_height'] = '500px';
    $config['geocodeCaching'] = true;
    //$config['map_width'] = '500px';
    $config['scrollwheel'] = false;


    $config['directions'] = true;
    $config['directionsStart'] = 'Air Canada Centre,Toronto';
    $config['directionsEnd'] = 'Yorkdale,Toronto';
    $config['directionsDivID'] = 'directionsDiv';

    GMaps::initialize($config);
    $map = GMaps::create_map();

    return view('welcome')->with('map',$map);
});
