<?php

require_once("class/model/Entity.php");
require_once("class/model/Field.php");

class _SistemaEntity extends Entity {
  public $name = "sistema";
  public $alias = "sist";
 
  public function getPk(){
    return Field::getInstanceRequire("sistema", "id");
  }

  public function getFieldsNf(){
    return array(
      Field::getInstanceRequire("sistema", "nombre"),
      Field::getInstanceRequire("sistema", "creado"),
    );
  }


}
