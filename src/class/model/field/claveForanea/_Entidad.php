<?php

require_once("class/model/Field.php");

class _FieldClaveForaneaEntidad extends Field {

  public $type = "varchar";
  public $fieldType = "mu";
  public $unique = false;
  public $notNull = true;
  public $default = false;
  public $length = "45";
  public $main = false;
  public $name = "entidad";
  public $alias = "ent";


  public function getEntity(){ return Entity::getInstanceRequire('clave_foranea'); }

  public function getEntityRef(){ return Entity::getInstanceRequire('entidad'); }


}
