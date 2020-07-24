<?php

require_once("class/model/Entity.php");
require_once("class/model/Field.php");

class _ClaveForaneaEntity extends Entity {
  public $name = "clave_foranea";
  public $alias = "cf";
 
  public function getPk(){
    return Field::getInstanceRequire("clave_foranea", "id");
  }

  public function getFieldsNf(){
    return array(
    );
  }

  public function getFieldsMu(){
    return array(
      Field::getInstanceRequire("clave_foranea", "entidad"),
    );
  }

  public function getFields_U(){
    return array(
      Field::getInstanceRequire("clave_foranea", "campo"),
    );
  }


}
