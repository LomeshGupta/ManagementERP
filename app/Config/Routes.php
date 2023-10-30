<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/signup', 'SignupController::index');
$routes->get('/userlist', 'ProfileController::Userlist');
$routes->post('/edituser', 'SignupController::edituser');
$routes->post('/postuser', 'SignupController::store');
$routes->get('/signin', 'SigninController::index');
$routes->post('/loginauth', 'SigninController::loginAuth');
$routes->get('/logout', 'LogoutController::index');
$routes->get('/usersetup', 'ProfileController::usersetup');
$routes->post('/update', 'EditController::edit');
$routes->post('/updateuser/(:any)', 'EditController::updateuser/$1');
$routes->get('/chat', 'ProfileController::chat');
$routes->get('/items', 'MastersController::items');
$routes->post('/storeitem', 'MastersController::storeitem');
$routes->post('/edititem', 'MastersController::edititem');
$routes->get('/additem', 'MastersController::additem');
