<?php

require_once("class/model/Sqlo.php");
require_once("class/model/Sql.php");
require_once("class/model/Entity.php");
require_once("class/model/Values.php");

class _CampoSqlo extends EntitySqlo {

  public function __construct(){
    /**
     * Se definen todos los recursos de forma independiente, sin parametros en el constructor, para facilitar el polimorfismo de las subclases
     */
    $this->db = Dba::dbInstance();
    $this->entity = Entity::getInstanceRequire('campo');
    $this->sql = EntitySql::getInstanceRequire('campo');
  }

  protected function _insert(array $row){ //@override
      $sql = "
  INSERT INTO " . $this->entity->sn_() . " (";
      $sql .= "id, " ;
    $sql .= "nombre, " ;
    $sql .= "alias, " ;
    $sql .= "valor_defecto, " ;
    $sql .= "longitud, " ;
    $sql .= "longitud_minima, " ;
    $sql .= "no_nulo, " ;
    $sql .= "unico, " ;
    $sql .= "principal, " ;
    $sql .= "tipo_dato, " ;
    $sql .= "tipo_campo, " ;
    $sql .= "subtipo, " ;
    $sql .= "creado, " ;
    $sql .= "entidad, " ;
    $sql = substr($sql, 0, -2); //eliminar ultima coma

    $sql .= ")
VALUES ( ";
    $sql .= $row['id'] . ", " ;
    $sql .= $row['nombre'] . ", " ;
    $sql .= $row['alias'] . ", " ;
    $sql .= $row['valor_defecto'] . ", " ;
    $sql .= $row['longitud'] . ", " ;
    $sql .= $row['longitud_minima'] . ", " ;
    $sql .= $row['no_nulo'] . ", " ;
    $sql .= $row['unico'] . ", " ;
    $sql .= $row['principal'] . ", " ;
    $sql .= $row['tipo_dato'] . ", " ;
    $sql .= $row['tipo_campo'] . ", " ;
    $sql .= $row['subtipo'] . ", " ;
    $sql .= $row['creado'] . ", " ;
    $sql .= $row['entidad'] . ", " ;
    $sql = substr($sql, 0, -2); //eliminar ultima coma

    $sql .= ");
";

    return $sql;
  }

  protected function _update(array $row){ //@override
    $sql = "
UPDATE " . $this->entity->sn_() . " SET
";
    if (isset($row['nombre'] )) $sql .= "nombre = " . $row['nombre'] . " ," ;
    if (isset($row['alias'] )) $sql .= "alias = " . $row['alias'] . " ," ;
    if (isset($row['valor_defecto'] )) $sql .= "valor_defecto = " . $row['valor_defecto'] . " ," ;
    if (isset($row['longitud'] )) $sql .= "longitud = " . $row['longitud'] . " ," ;
    if (isset($row['longitud_minima'] )) $sql .= "longitud_minima = " . $row['longitud_minima'] . " ," ;
    if (isset($row['no_nulo'] )) $sql .= "no_nulo = " . $row['no_nulo'] . " ," ;
    if (isset($row['unico'] )) $sql .= "unico = " . $row['unico'] . " ," ;
    if (isset($row['principal'] )) $sql .= "principal = " . $row['principal'] . " ," ;
    if (isset($row['tipo_dato'] )) $sql .= "tipo_dato = " . $row['tipo_dato'] . " ," ;
    if (isset($row['tipo_campo'] )) $sql .= "tipo_campo = " . $row['tipo_campo'] . " ," ;
    if (isset($row['subtipo'] )) $sql .= "subtipo = " . $row['subtipo'] . " ," ;
    if (isset($row['creado'] )) $sql .= "creado = " . $row['creado'] . " ," ;
    if (isset($row['entidad'] )) $sql .= "entidad = " . $row['entidad'] . " ," ;
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
    return $row_;
  }

  public function values(array $row){
    $row_ = [];

    $row_["campo"] = EntityValues::getInstanceRequire("campo", $row);
    $row_["entidad"] = EntityValues::getInstanceRequire('entidad', $row, 'ent_');
    $row_["sistema"] = EntityValues::getInstanceRequire('sistema', $row, 'ent_sis_');
    return $row_;
  }



}
