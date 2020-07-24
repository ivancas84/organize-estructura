<?php

require_once("class/model/Sqlo.php");
require_once("class/model/Sql.php");
require_once("class/model/Entity.php");
require_once("class/model/Values.php");

class _ClaveForaneaSqlo extends EntitySqlo {

  public function __construct(){
    /**
     * Se definen todos los recursos de forma independiente, sin parametros en el constructor, para facilitar el polimorfismo de las subclases
     */
    $this->db = Dba::dbInstance();
    $this->entity = Entity::getInstanceRequire('clave_foranea');
    $this->sql = EntitySql::getInstanceRequire('clave_foranea');
  }

  protected function _insert(array $row){ //@override
      $sql = "
  INSERT INTO " . $this->entity->sn_() . " (";
      $sql .= "id, " ;
    $sql .= "entidad, " ;
    $sql .= "campo, " ;
    $sql = substr($sql, 0, -2); //eliminar ultima coma

    $sql .= ")
VALUES ( ";
    $sql .= $row['id'] . ", " ;
    $sql .= $row['entidad'] . ", " ;
    $sql .= $row['campo'] . ", " ;
    $sql = substr($sql, 0, -2); //eliminar ultima coma

    $sql .= ");
";

    return $sql;
  }

  protected function _update(array $row){ //@override
    $sql = "
UPDATE " . $this->entity->sn_() . " SET
";
    if (isset($row['entidad'] )) $sql .= "entidad = " . $row['entidad'] . " ," ;
    if (isset($row['campo'] )) $sql .= "campo = " . $row['campo'] . " ," ;
    //eliminar ultima coma
    $sql = substr($sql, 0, -2);

    return $sql;
  }

  public function json(array $row = null){
    if(empty($row)) return null;
    $row_ = $this->sql->_json($row);
    if(!is_null($row['ent_id'])){
      $json = EntitySql::getInstanceRequire('entidad', 'ent')->_json($row);
      $row_["entidad_"] = $json;
    }
    if(!is_null($row['ent_sis_id'])){
      $json = EntitySql::getInstanceRequire('sistema', 'ent_sis')->_json($row);
      $row_["entidad_"]["sistema_"] = $json;
    }
    if(!is_null($row['cam_id'])){
      $json = EntitySql::getInstanceRequire('campo', 'cam')->_json($row);
      $row_["campo_"] = $json;
    }
    if(!is_null($row['cam_ent_id'])){
      $json = EntitySql::getInstanceRequire('entidad', 'cam_ent')->_json($row);
      $row_["campo_"]["entidad_"] = $json;
    }
    if(!is_null($row['cam_ent_sis_id'])){
      $json = EntitySql::getInstanceRequire('sistema', 'cam_ent_sis')->_json($row);
      $row_["campo_"]["entidad_"]["sistema_"] = $json;
    }
    return $row_;
  }

  public function values(array $row){
    $row_ = [];

    $row_["clave_foranea"] = EntityValues::getInstanceRequire("clave_foranea", $row);
    $row_["entidad"] = EntityValues::getInstanceRequire('entidad', $row, 'ent_');
    $row_["sistema"] = EntityValues::getInstanceRequire('sistema', $row, 'ent_sis_');
    $row_["campo"] = EntityValues::getInstanceRequire('campo', $row, 'cam_');
    $row_["entidad1"] = EntityValues::getInstanceRequire('entidad', $row, 'cam_ent_');
    $row_["sistema1"] = EntityValues::getInstanceRequire('sistema', $row, 'cam_ent_sis_');
    return $row_;
  }



}
