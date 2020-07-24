<?php

require_once("class/model/Entity.php");

$structure = array (
  Entity::getInstanceRequire("campo"),
  Entity::getInstanceRequire("clave_foranea"),
  Entity::getInstanceRequire("entidad"),
  Entity::getInstanceRequire("sistema"),
);

  Entity::setStructure($structure);

