<?php

namespace App\Clases;

class Utilitat {
    public static function errorMessage($e)
    {
        $mensaje = 'Error desconocido';

        try {
            if (isset($e->errorInfo[1])) {
                // Si hay información de error SQL
                switch ($e->errorInfo[1]) {
                    case 1062:
                        $mensaje = 'Registro duplicado';
                        break;
                    case 1451:
                        $mensaje = 'Registro con elementos relacionados';
                        break;
                    default:
                        $mensaje = $e->errorInfo[1] . ' - ' . $e->errorInfo[2];
                        break;
                }
            } else {
                // Si no hay error SQL, verificar el código de la excepción
                switch ($e->getCode()) {
                    case 1044:
                        $mensaje = "Usuario y/o password incorrecto";
                        break;
                    case 1049:
                        $mensaje = "Base de datos desconocida";
                        break;
                    case 2002:
                        $mensaje = "No se encuentra el servidor";
                        break;
                    default:
                        $mensaje = $e->getCode() . ' - ' . $e->getMessage();
                        break;
                }
            }
        } catch (Exception $ex) {
            // En caso de un error inesperado en el manejo de la excepción
            $mensaje = 'Error al procesar la excepción: ' . $ex->getMessage();
        }

        return $mensaje;
    }
}

