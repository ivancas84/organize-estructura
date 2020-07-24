<?php

require_once("class/model/Field.php");

class _FieldCampoLongitudMinima extends Field {

  public $type = "int";
  public $fieldType = "nf";
  public $unique = false;
  public $notNull = false;
  public $default = false;
  public $length = "10";
  public $main = false;
  public $name = "longitud_minima";
  public $alias = "lm";


  public function getEntity(){ return Entity::getInstanceRequire('campo'); }


}
