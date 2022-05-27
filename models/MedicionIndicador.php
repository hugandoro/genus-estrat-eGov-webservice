<?php
class MedicionIndicador
{
    private $pdo;

    // Metodo para iniciar el constructor
	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    // Metodo para obtener los datos puntuales de un registro
	public function consultar($numeral){
		try{
			$stm = $this->pdo
			            ->prepare("SELECT n1.nombre as linea, n2.nombre as programa, n3.nombre as proyecto, b.numeral as numero_meta, b.nombre  as meta, a.nombre  as indicador, c.nombre  as medida, d.nombre  as tipo_medida, a.linea_base as linea_base_2019, a.meta as meta_2023, a.objetivo as objetivo_cuatrienio, a.valor_realizado as valor_realizado, a.porcentaje_realizado as porcentaje_realizado, a.rezago as rezago_acumulado, e.nombre as dependencia_responsable FROM medicion_indicadors AS a INNER JOIN plan_desarrollo_nivel4s AS b ON a.nivel4_id = b.id INNER JOIN medicion_medidas AS c ON a.medida_id = c.id INNER JOIN medicion_tipos AS d ON a.tipo_id = d.id INNER JOIN entidad_oficinas AS e ON b.oficina_id = e.id INNER JOIN plan_desarrollo_nivel3s AS n3 ON b.nivel3_id = n3.id INNER JOIN plan_desarrollo_nivel2s AS n2 ON n3.nivel2_id = n2.id INNER JOIN plan_desarrollo_nivel1s AS n1 ON n2.nivel1_id = n1.id WHERE a.nivel4_id = ?");

			$stm->execute(array($numeral));
			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}
}
