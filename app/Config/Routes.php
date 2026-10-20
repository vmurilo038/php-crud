<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Inicio::index');
$routes->get('usuarios', 'Usuarios::index');
$routes->post('usuarios/criar', 'Usuarios::criar');
$routes->post('usuarios/editar/(:segment)', 'Usuarios::editar/$1');
$routes->post('usuarios/excluir/(:segment)', 'Usuarios::excluir/$1');
