<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
       // Base de respuestas para el API
       public function sendResponse($result, $message)
       {
           $response = [
               'success' => true,
               'data'    => $result,
               'message' => $message,
           ];
           return response()->json($response, 200);
       }


       // Respuesta cuando hay un error en la solicitud
       protected function sendError($error, $errorMessages = [], $code = 404)
       {
           $response = [
               'success' => false,
               'message' => $error,
           ];
           if(!empty($errorMessages)){
               $response['data'] = $errorMessages;
           }
           return response()->json($response, $code);
       }
}
