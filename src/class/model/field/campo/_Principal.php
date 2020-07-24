<?php

require_once("class/model/Field.php");

class _FieldCampoPrincipal extends Field {

  public $type = "tinyint";
  public $fieldType = "nf";
  public $unique = false;
  public $notNull = false;
  public $default = false;
  public $length = "3";
  public $main = false;
  public $name = "principal";
  public $alias = "pri";


  public function getEntity(){ return Entity::getInstanceRequire('campo'); }


}
