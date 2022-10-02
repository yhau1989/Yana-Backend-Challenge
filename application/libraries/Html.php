<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Html
{
    public function head()
    {
        $baseurl = strtolower(base_url());
        $top = '<html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title>Yana Chanllenge</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <script src="https://cdn.tailwindcss.com"></script>
                </head>
                <body>';
        echo $top;
    }
    
   
    public function menuDashboard()
    {
        $baseurl = strtolower(base_url());
        $menu = '<div class="ui fixed inverted menu">
                    <div class="ui container">
                        <a href="' . $baseurl . 'dashboard" class="header item">
                            <img class="logo" src="' . $baseurl . 'assets/images/cropped-IMG-20181016-WA0435-2.jpg">
                            <span>&nbsp; Administrador Procefibras App</span>
                        </a>
                        <div class="ui simple dropdown item">
                            Opciones <i class="dropdown icon"></i>
                            <div class="menu">
                                 <div class="item">
                                    <b>Compras</b>
                                    <div class="menu">
                                        <a class="item" href="' . $baseurl . 'dashboard/reportecompras">Compras Realizadas</a>
                                        <a class="item" href="' . $baseurl . 'dashboard/reportecomprasporproductos">Compras por productos</a>
                                    </div>
                                </div>
                                <div class="item">
                                    <b>Ventas</b>
                                    <div class="menu">
                                        <a class="item" href="' . $baseurl . 'dashboard/reporteventas">Ventas Realizadas</a>
                                        <a class="item" href="' . $baseurl . 'dashboard/reporteventasporproductos">Ventas por producto</a>
                                    </div>
                                </div>
                                <a class="item" href="' . $baseurl . 'dashboard/reporteodt">Ordernes de Trabajo</a>
                                <a class="item" href="' . $baseurl . 'dashboard/reportelotes">Bodega de producto por lote</a>
                            </div>
                        </div>
                        <a href="' . $baseurl . '/dashboard/closesession" class="right item">Salir &nbsp; <i class="long arrow alternate right icon"></i></a>
                    </div>
                </div>';
        echo $menu;
    }

    
    public function footer()
    {
        $foo = '</body>
        </html>';
        echo $foo;
    }
}