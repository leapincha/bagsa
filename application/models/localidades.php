<?php
Class Localidades extends MY_Model
{

  function __construct() {
           parent::__construct();
           $this->table="localidad";
           }


  function get_localidades($sort = '', $order = 'ASC')
  {
  	 $query = "SELECT localidad.*, unidad_operativa.nombre as unidad_operativa, regional.nombre as regional  
                  FROM $this->table
                  INNER JOIN unidad_operativa ON unidad_operativa.id = localidad.id_uo
                  INNER JOIN regional ON unidad_operativa.id_regional = regional.id";

        if (!empty($sort)) {
            $query .= " ORDER BY $sort $order";
        }

        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->result();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
  }

  function get_localidad($id_locali)
  {

      $query = "SELECT localidad.*, datos_tecnicos.usuarios_potenciales as potenciales, datos_tecnicos.usuarios as usuarios, datos_generales.tel_oficina as tel_oficina,datos_generales.direc_oficina as direc_oficina , datos_generales.tel_cooperativa as tel_cooperativa ,datos_generales.direc_cooperativa as direc_cooperativa ,datos_generales.bombero as bombero , datos_generales.policia as policia, datos_generales.defensa_civil as defensa_civil, unidad_operativa.nombre as nombre_unidad, regional.nombre as nombre_regional, regional.responsable as responsable_regional, tipo_red.nombre_red as nombre_red, datos_tecnicos.long_red as long_red, datos_tecnicos.cant_radios as cant_radios, datos_tecnicos.cant_valvulas as cant_valvulas, datos_planta.cant_tanques as cant_tanques, datos_planta.cant_vapo as cant_vapo, datos_planta.capac_dist as capac_dist, datos_planta.capac_almacenaje as capac_almacenaje
                FROM $this->table
                INNER jOIN datos_generales on datos_generales.id_localidad= $id_locali
                INNER JOIN datos_tecnicos on datos_tecnicos.id_localidad= $id_locali
                INNER JOIN tipo_red on datos_tecnicos.red= tipo_red.idred
                INNER JOIN datos_planta on datos_planta.id_localidad= $id_locali
                INNER JOIN unidad_operativa on unidad_operativa.id=localidad.id_uo
                INNER JOIN regional on regional.id= unidad_operativa.id_regional
                WHERE localidad.id = $id_locali";
        
        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->row();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;

  }


}