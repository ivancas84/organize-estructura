<?php

require_once("class/model/Field.php");

class _FieldEntidadSistema extends Field {

  public $type = "varchar";
  public $fieldType = "mu";
  public $unique = false;
  public $notNull = true;
  public $default = false;
  public $length = "45";
  public $main = false;
  public $name = "sistema";
  public $alias = "sis";


  public function getEntity(){ return Entity::getInstanceRequire('entidad'); }

  public function getEntityRef(){ return Entity::getInstanceRequire('sistema'); }


}
