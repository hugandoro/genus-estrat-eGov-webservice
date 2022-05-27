<?php
// Ruta de la clase econea/nusoap
require_once "vendor/econea/nusoap/src/nusoap.php";

// 1 - Nombre del servicio
$namespace = "namespaceServiceSOAP";
$server = new soap_server();
$server->soap_defencoding = 'UTF-8';
$server->configureWSDL("serviceSOAP", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

// 2 - Estructura del servicio
$server->wsdl->addComplexType(
       'parameterServiceSOAP', // Nombre personalizado
       'complexType',
       'struct',
       'all',
       '',
       array(
              'numeral' => array('name' => 'numeral', 'type' => 'xsd:string'), // Parametro a solicitar
       )
);

// 3 - Estructura de la respuesta del servicio
$server->wsdl->addComplexType(
       'responseServiceSOAP', // Nombre personalizado
       'complexType',
       'struct',
       'all',
       '',
       array(
              'linea_nombre' => array('name' => 'linea_nombre', 'type' => 'xsd:string'), // Parametro a retornar
              'programa_nombre' => array('name' => 'programa_nombre', 'type' => 'xsd:string'), // Parametro a retornar
              'proyecto_nombre' => array('name' => 'proyecto_nombre', 'type' => 'xsd:string'), // Parametro a retornar
              'actividad_nombre' => array('name' => 'actividad_nombre', 'type' => 'xsd:string'), // Parametro a retornar
              'actividad_numeral' => array('name' => 'actividad_numeral', 'type' => 'xsd:string'), // Parametro a retornar
              'porcentaje_realizado' => array('name' => 'porcentaje_realizado', 'type' => 'xsd:string'), // Parametro a retornar
              'dependencia_responsable' => array('name' => 'dependencia_responsable', 'type' => 'xsd:string'), // Parametro a retornar

       )
);

// 4 - Registro del nuevo servicio
$server->register(
       "functionServiceSOAP",
       array("serviceSOAP" => "tns:parameterServiceSOAP"), // Nombre personalizado definido para la estructura del servicio
       array("serviceSOAP" => "tns:responseServiceSOAP"), // Nombre personalizado definido para la estructura de la respuesta del servicio
       $namespace,
       false,
       "rpc",
       "encoded",
       "Consultar el nivel de avance de una actividad del Plan de Desarrollo Dosquebradas Empresa de Todos 2020 - 2023" // Descripcion personalizada
);


// Funcion cuerpo del servicio, procesa y tramita la respuesta
// Aqui va el codigo principal que retorna el valor contenido en la o las variables respuesta
function functionServiceSOAP($request)
{
       // Libreria requerida para conectar a BD
       require_once 'lib/db/database.php';

       // Modelo requerido para consultar la tabla respectiva de la BD
       require_once "models/MedicionIndicador.php";

       $medicionIndicador = new MedicionIndicador();
       $medicionIndicador = $medicionIndicador->consultar($request['numeral']);

       return array(
              "linea_nombre" => $medicionIndicador->linea,
              "programa_nombre" => $medicionIndicador->programa,
              "proyecto_nombre" => $medicionIndicador->proyecto,
              "actividad_nombre" => $medicionIndicador->meta,
              "actividad_numeral" => $medicionIndicador->numero_meta,
              "porcentaje_realizado" => ($medicionIndicador->porcentaje_realizado * 100),
              "dependencia_responsable" => $medicionIndicador->dependencia_responsable
       );
}

// Cabecera que permite al servicio leer los datos que le envian
$POST_DATA = file_get_contents("php://input");
$server->service($POST_DATA);
exit();
