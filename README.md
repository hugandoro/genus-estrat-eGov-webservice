# genus-estrat-eGov-webservice
Servicios SOAP webservice - EstrateGov 

Repositorio de servicios SOAP - Plataforma EstrateGov


SERVICIO N° 1
Obtener datos de una actividad (Meta) con su nivel de cumplimiento del indicador correspondiente
Ruta del endpoint "/genus-estrat-eGov-webservice/serviceMedicionIndicador.php?wsdl"

Parametros requeridos
numeral | Numero de la actividad (Meta) a consultar

Parametros retornados
linea_nombre | Nombre de la linea (Nivel 1)
programa_nombre | Nombre del programa (Nivel 2)
proyecto_nombre | Nombre del proyecto (Nivel 3)
actividad_nombre | Nombre de la actividad/meta (Nivel 4)
actividad_numeral | Numero de la actividad/meta
porcentaje_realizado | Porcentaje de cumplimiento acumulado para el cuatrienio
dependencia_responsable | Secretaria/dependencia responsable



