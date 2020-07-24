<?php

require_once("class/model/Entity.php");
require_once("class/model/Field.php");

class _EntidadEntity extends Entity {
  public $name = "entidad";
  public $alias = "enti";
 
  public function getPk(){
    return Field::getInstanceRequire("entidad", "id");
  }

  public function getFieldsNf(){
    return array(
      Field::getInstanceRequire("entidad", "nombre"),
      Field::getInstanceRequire("entidad", "alias"),
    );
  }

  public function getFieldsMu(){
    return array(
      Field::getInstanceRequire("entidad", "sistema"),
    );
  }


}
