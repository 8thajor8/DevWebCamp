<?php

namespace Controllers;

use MVC\Router;
use Model\Regalo;
use Model\Paquete;
use Model\Usuario;
use Model\Registro;
use Classes\Paginacion;

class RegistradosController {
    public static function index(Router $router) {

        if(!is_admin()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/registrados?page=1');
        }
        
        $registros_por_pagina = 10;
        $total = Registro::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        $registrados = Registro::paginar($registros_por_pagina, $paginacion->offset());

        if($paginacion->total_paginas() < $pagina_actual){
            header('Location: /admin/registrados?page=1');
        }
        
        foreach($registrados as $registro){
            $registro->paquete = Paquete::find($registro->paquete_id);
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->regalo = Regalo::find($registro->regalo_id);
        }

        

        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
            'registrados' => $registrados,
            'paginacion' => $paginacion->paginacion()
        ]);
        
    }
}