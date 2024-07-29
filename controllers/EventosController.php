<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Categoria;

class EventosController {
    public static function index(Router $router) {

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
        
    }

    public static function crear(Router $router) {
        if(!is_admin()){
            header('Location: /login');
        }
        $alertas = [];

        $categorias = Categoria::all();
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           
            
            $evento->sincronizar($_POST);
            
            //Validar
            $alertas = $evento->validar();

            //Guardar Registro
            if(empty($alertas)){

                //Guardar en DB
                $resultado = $evento->guardar();

                if($resultado){
                    header('Location: /admin/eventos');
                }
            }

        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Evento', 
            'alertas' => $alertas, 
            'categorias' => $categorias, 
            'dias' => $dias, 
            'horas' => $horas, 
            'evento' => $evento
            
        ]);
        
    }
}