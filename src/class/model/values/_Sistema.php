<?php

require_once("class/tools/Format.php");
require_once("class/model/Values.php");

class _Sistema extends EntityValues {
  protected $id = UNDEFINED;
  protected $nombre = UNDEFINED;
  protected $creado = UNDEFINED;

  public function _setDefault(){
    $this->setId(DEFAULT_VALUE);
    $this->setNombre(DEFAULT_VALUE);
    $this->setCreado(DEFAULT_VALUE);
  }

  public function _fromArray(array $row = NULL, $p = ""){
    if(empty($row)) return;
    if(isset($row[$p."id"])) $this->setId($row[$p."id"]);
    if(isset($row[$p."nombre"])) $this->setNombre($row[$p."nombre"]);
    if(isset($row[$p."creado"])) $this->setCreado($row[$p."creado"]);
  }

  public function _toArray(){
    $row = [];
    if($this->id !== UNDEFINED) $row["id"] = $this->id();
    if($this->nombre !== UNDEFINED) $row["nombre"] = $this->nombre();
    if($this->creado !== UNDEFINED) $row["creado"] = $this->creado("Y-m-d H:i:s");
    return $row;
  }

  public function _isEmpty(){
    if(!Validation::is_empty($this->id)) return false;
    if(!Validation::is_empty($this->nombre)) return false;
    if(!Validation::is_empty($this->creado)) return false;
    return true;
  }

  public function id() { return $this->id; }
  public function nombre($format = null) { return Format::convertCase($this->nombre, $format); }
  public function creado($format = null) { return Format::date($this->creado, $format); }
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

  public function _setCreado(DateTime $p = null) {
      $check = $this->checkCreado($p); 
      if($check) $this->creado = $p;  
      return $check;
  }

  public function setCreado($p, $format = "Y-m-d H:i:s") {
    $p = ($p == DEFAULT_VALUE) ? date('Y-m-d H:i:s') : trim($p);
    if(!is_null($p)) $p = SpanishDateTime::createFromFormat($format, $p);    
    $check = $this->checkCreado($p); 
    if($check) $this->creado = $p;  
    return $check;
  }

  public function checkId($value) { 
      return true; 
  }

  public function checkNombre($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("nombre", $v);
  }

  public function checkCreado($value) { 
    $v = Validation::getInstanceValue($value)->date()->required();
    return $this->_setLogsValidation("creado", $v);
  }



}
