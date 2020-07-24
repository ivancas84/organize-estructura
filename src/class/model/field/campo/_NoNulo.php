<?php

require_once("class/model/Field.php");

class _FieldCampoNoNulo extends Field {

  public $type = "tinyint";
  public $fieldType = "nf";
  public $unique = false;
  public $notNull = true;
  public $default = false;
  public $length = "3";
  public $main = false;
  public $name = "no_nulo";
  public $alias = "nn";


  public function getEntity(){ return Entity::getInstanceRequire('campo'); }


}
