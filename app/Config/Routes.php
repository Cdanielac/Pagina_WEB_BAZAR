<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('inicio');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Home
$routes->get('/', 'Home::inicio');
$routes->get('quienesomos', 'Home::quienesomos');
$routes->get('productos', 'Home::productos');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('contacto', 'Home::contacto');
$routes->get('terminosycondiciones', 'Home::terminosycondiciones');

//admin
    $routes->get('admin_usuario', 'Admin_controller::admin',['filter' => 'admin']);
    $routes->get('tablaUsuarios', 'Admin_controller::verUsuarios',['filter' => 'admin']);
    $routes->get('tablaUsuariosEliminados', 'Admin_controller::usuariosEliminados',['filter' => 'admin']);
    $routes->get('tablaProductos', 'Admin_controller::verProductos',['filter' => 'admin']);
    $routes->get('tablaProductosEliminados', 'Admin_controller::productosEliminados',['filter' => 'admin']);
    $routes->get('tablaConsultas', 'Admin_controller::verConsultas',['filter' => 'admin']);
    $routes->get('tablaConsultasEliminados', 'Admin_controller::consultasEliminados',['filter' => 'admin']);
    $routes->get('tablaVentas', 'Admin_controller::verVentas',['filter' => 'admin']);
    $routes->get('tablaVentasEliminados', 'Admin_controller::ventasEliminados',['filter' => 'admin']);
    $routes->post('verDetalle', 'Admin_controller::verDetalle',['filter' => 'admin']);
    $routes->post('modificarUsuarioAd', 'Admin_controller::modificarPerfil',['filter' => 'admin']);//Solo modifica el usuario admin
    $routes->post('actualizarUsuarioAd', 'Admin_controller::actualizarUsuario',['filter' => 'admin']);//efectua la modificación
    $routes->get('nuevoProducto', 'Producto_controller::nuevoProducto',['filter' => 'admin']);//vista
    $routes->post('registrarProducto', 'Producto_controller::registrarProducto',['filter' => 'admin']);
    $routes->post('editarProducto', 'Producto_controller::editarProducto',['filter' => 'admin']);
    $routes->post('actualizarProducto', 'Producto_controller::actualizarProducto',['filter' => 'admin']);

//Visitante
    $routes->get('crearcuenta', 'Usuario_Controller::nuevoUsuario'); //muestra vista
    $routes->post('registro_usuario', 'Usuario_controller::registrar_usuario'); //efectua el registro
    $routes->get('login', 'Usuario_Controller::login');
    $routes->post('validaSesion', 'Usuario_controller::valida');
    $routes->post('registro_consulta', 'Consulta_controller::registrar_consulta');
    $routes->get('catalogoProductos', 'Producto_controller::verCatalogo'); //Puede ver pero no comprar
    $routes->post('buscarProductos', 'Producto_controller::buscarPorCategoria');

//Cliente
    $routes->post('modificarUsuario', 'Usuario_controller::modificarPerfil',['filter' => 'auth']);//muestra 
    $routes->post('actualizarUsuario', 'Usuario_controller::actualizarUsuario',['filter' => 'auth']);//efectua la modificación
    $routes->post('cerrarSesion', 'Usuario_controller::cerrarSesion',['filter' => 'auth']);
    $routes->get('carrito', 'Carrito_controller::verCarrito',['filter' => 'auth']);
    $routes->get('eliminarItem', 'Carrito_controller::eliminarItem',['filter' => 'auth']);
    $routes->get('vaciarCarrito', 'Carrito_controller::vaciarCarrito',['filter' => 'auth']);
    $routes->get('actualizarCarrito', 'Carrito_controller::actualizarCarrito',['filter' => 'auth']);
    $routes->get('finalizarCompra', 'Venta_controller::verFinalizarCompra',['filter' => 'auth']);
    $routes->post('elegirMedioPago', 'Venta_controller::elegirMedioPago',['filter' => 'auth']);
    $routes->post('FacturaEf', 'Venta_controller::generarFacturaEf',['filter' => 'auth']);
    $routes->post('FacturaTC', 'Venta_controller::generarFacturaTC',['filter' => 'auth']);
    $routes->post('FacturaTD', 'Venta_controller::generarFacturaTD',['filter' => 'auth']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
