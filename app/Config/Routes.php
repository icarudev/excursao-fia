<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
//$routes->get('/', 'Home::index');
$routes->get('/', 'ViagensController::index');

// --- Rotas Viagens ---
$routes->group('viagens', function ($routes) {
    $routes->get('/', 'ViagensController::index');
    $routes->get('novo', 'ViagensController::novo');
    $routes->post('salvar', 'ViagensController::salvar');
    $routes->get('deletar/(:num)', 'ViagensController::deletar/$1');
    $routes->get('editar/(:num)', 'ViagensController::editar');
});

// --- Rotas Pessoas ---
// $routes->group('pessoas', function ($routes) {
//     $routes->get('/', 'PessoasController::index');
//     $routes->get('novo', 'PessoasController::novo');
//     $routes->post('salvar', 'PessoasController::salvar');
//     $routes->get('deletar/(:num)', 'PessoasController::deletar/$1');
//     $routes->get('editar/(:num)', 'PessoasController::editar');
// });

// --- Rotas Apartamentos ---
$routes->group('apartamentos', function ($routes) {
    $routes->get('/', 'ApartamentosController::index');
    $routes->get('novo', 'ApartamentosController::novo');
    $routes->post('salvar', 'ApartamentosController::salvar');
    $routes->get('deletar/(:num)', 'ApartamentosController::deletar/$1');
    $routes->get('editar/(:num)', 'ApartamentosController::editar');
});

// --- Rota Backup ---
$routes->get('backup', 'BackupController::baixar');
