<?php

require_once("class/tools/Format.php");
require_once("class/model/Values.php");

class _Entidad extends EntityValues {
  protected $id = UNDEFINED;
  protected $nombre = UNDEFINED;
  protected $alias = UNDEFINED;
  protected $sistema = UNDEFINED;

  public function _setDefault(){
    $this->setId(DEFAULT_VALUE);
    $this->setNombre(DEFAULT_VALUE);
    $this->setAlias(DEFAULT_VALUE);
    $this->setSistema(DEFAULT_VALUE);
  }

  public function _fromArray(array $row = NULL, $p = ""){
    if(empty($row)) return;
    if(isset($row[$p."id"])) $this->setId($row[$p."id"]);
    if(isset($row[$p."nombre"])) $this->setNombre($row[$p."nombre"]);
    if(isset($row[$p."alias"])) $this->setAlias($row[$p."alias"]);
    if(isset($row[$p."sistema"])) $this->setSistema($row[$p."sistema"]);
  }

  public function _toArray(){
    $row = [];
    if($this->id !== UNDEFINED) $row["id"] = $this->id();
    if($this->nombre !== UNDEFINED) $row["nombre"] = $this->nombre();
    if($this->alias !== UNDEFINED) $row["alias"] = $this->alias();
    if($this->sistema !== UNDEFINED) $row["sistema"] = $this->sistema();
    return $row;
  }

  public function _isEmpty(){
    if(!Validation::is_empty($this->id)) return false;
    if(!Validation::is_empty($this->nombre)) return false;
    if(!Validation::is_empty($this->alias)) return false;
    if(!Validation::is_empty($this->sistema)) return false;
    return true;
  }

  public function id() { return $this->id; }
  public function nombre($format = null) { return Format::convertCase($this->nombre, $format); }
  public function alias($format = null) { return Format::convertCase($this->alias, $format); }
  public function sistema($format = null) { return Format::convertCase($this->sistema, $format); }
  public function setId($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkId($p); 
    if($check) $this->id = $p;
    return $check;
  }

  public function setNombre($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkNombre($p); 
    if($check) $this->nombre = $p;
    return $check;
  }

  public function setAlias($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkAlias($p); 
    if($check) $this->alias = $p;
    return $check;
  }

  public function setSistema($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkSistema($p); 
    if($check) $this->sistema = $p;
    return $check;
  }

  public function checkId($value) { 
      return true; 
  }

  public function checkNombre($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("nombre", $v);
  }

  public function checkAlias($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("alias", $v);
  }

  public function checkSistema($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("sistema", $v);
  }



}
