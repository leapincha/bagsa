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

      $query = "SELECT localidad.*, datos_generales.usuarios_potenciales as potenciales, datos_generales.latitud as latitud, datos_generales.longitud as longitud , datos_generales.cant_usuarios as usuarios, unidad_operativa.nombre as nombre_unidad, regional.nombre as nombre_regional, regional.responsable as responsable_regional
                FROM $this->table
                INNER jOIN datos_generales on datos_generales.id_localidad= $id_locali
                INNER JOIN datos_tecnicos on datos_tecnicos.id_localidad= $id_locali
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