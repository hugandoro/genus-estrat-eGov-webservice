# genus-estrat-eGov-webservice
Servicios SOAP webservice - EstrateGov 

Repositorio de servicios SOAP - Plataforma EstrateGov

Obtener datos de una actividad (Meta) con su nivel de cumplimiento del indicador correspondiente
Ruta del endpoint "/genus-estrat-eGov-webservice/serviceMedicionIndicador.php?wsdl"
    >> Parametro requerido "numeral" | Numero de la actividad (Meta) a consultar
    << Parametro retornado "linea_nombre" | Nombre de la linea (Nivel 1)
    << Parametro retornado "programa_nombre" | Nombre del programa (Nivel 2)
    << Parametro retornado "proyecto_nombre" | Nombre del proyecto (Nivel 3)
    << Parametro retornado "actividad_nombre" | Nombre de la actividad/meta (Nivel 4)
    << Parametro retornado "actividad_numeral" | Numero de la actividad/meta
    << Parametro retornado "porcentaje_realizado" | Porcentaje de cumplimiento acumulado para el cuatrienio
    << Parametro retornado "dependencia_responsable" | Secretaria/dependencia responsable
