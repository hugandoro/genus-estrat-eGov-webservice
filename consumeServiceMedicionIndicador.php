<?php
// Limpiar cache SOAP WSDL
ini_set("soap.wsdl_cache_enabled", "0");

// Ruta del WSDL endpoint
$url = "http://127.0.0.1/genus-estrat-eGov-webservice/serviceMedicionIndicador.php?wsdl";

try {
    $client = new SoapClient($url, ["trace" => 1]);

    // Pasar los parametros del llamado del servicio a un array
    $numeral = "1";
    $parameters = array('numeral' => $numeral);

    $result = $client->functionServiceSOAP($parameters);
} catch (SoapFault $e) {
    echo $e->getMessage();
}

$linea = $result->linea_nombre;
$programa = $result->programa_nombre;
$proyecto = $result->proyecto_nombre;
$meta = $result->actividad_nombre;
$numero_meta = $result->actividad_numeral;
$porcentaje_realizado = $result->porcentaje_realizado;
$dependencia_responsable = $result->dependencia_responsable;

echo "<b>Meta N° </b>" . $numero_meta . " | " . $meta . " <br>";
echo "<b>Linea | </b>" . $linea . " <br>";
echo "<b>Programa | </b>" . $programa . " <br>";
echo "<b>Proyecto | </b>" . $proyecto . " <br>";
echo "<b>Porcentaje realizado | </b>" . $porcentaje_realizado . " <br>";
echo "<b>Dependencia responsable | </b>" . $dependencia_responsable . " <br>";


echo PHP_EOL;
