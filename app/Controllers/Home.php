<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function inicio()
    {
        $data=['titulo'=>'Inicio'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/home_view');
        echo view ('plantillas/footer');
    }

    public function quienesomos()
    {
        $data=['titulo'=>'QUIENES SOMOS'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/quienesomos_view');
        echo view ('plantillas/footer');
    }

    public function productos()
    {
        $data=['titulo'=>'CATÁLOGO DE PRODUCTOS'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/catalogoProductos');
        echo view ('plantillas/footer');
    }

    public function comercializacion()
    {
        $data=['titulo'=>'COMERCIALIZACIÓN'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/comercializacion_view');
        echo view ('plantillas/footer');
    }

    public function contacto()
    {
        $data=['titulo'=>'CONTACTO'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/contacto_view');
        echo view ('plantillas/footer');
    }

    public function terminosycondiciones()
    {
        $data=['titulo'=>'TÉRMINOS Y CONDICIONES'];
        echo view ('plantillas/header',$data);
        echo view ('plantillas/nav');
        echo view('contenido/TerminosyCondiciones');
        echo view ('plantillas/footer');
    }
}
