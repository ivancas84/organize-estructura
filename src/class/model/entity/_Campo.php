<?php

require_once("class/model/Entity.php");
require_once("class/model/Field.php");

class _CampoEntity extends Entity {
  public $name = "campo";
  public $alias = "camp";
 
  public function getPk(){
    return Field::getInstanceRequire("campo", "id");
  }

  public function getFieldsNf(){
    return array(
      Field::getInstanceRequire("campo", "nombre"),
      Field::getInstanceRequire("campo", "alias"),
      Field::getInstanceRequire("campo", "valor_defecto"),
      Field::getInstanceRequire("campo", "longitud"),
      Field::getInstanceRequire("campo", "longitud_minima"),
      Field::getInstanceRequire("campo", "no_nulo"),
      Field::getInstanceRequire("campo", "unico"),
      Field::getInstanceRequire("campo", "principal"),
      Field::getInstanceRequire("campo", "tipo_dato"),
      Field::getInstanceRequire("campo", "tipo_campo"),
      Field::getInstanceRequire("campo", "subtipo"),
      Field::getInstanceRequire("campo", "creado"),
    );
  }

  public function getFieldsMu(){
    return array(
      Field::getInstanceRequire("campo", "entidad"),
    );
  }


}
