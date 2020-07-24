<?php

require_once("class/model/Field.php");

class _FieldClaveForaneaCampo extends Field {

  public $type = "varchar";
  public $fieldType = "_u";
  public $unique = true;
  public $notNull = true;
  public $default = false;
  public $length = "45";
  public $main = false;
  public $name = "campo";
  public $alias = "cam";


  public function getEntity(){ return Entity::getInstanceRequire('clave_foranea'); }

  public function getEntityRef(){ return Entity::getInstanceRequire('campo'); }


}
