<?php

require_once("class/tools/Format.php");
require_once("class/model/Values.php");

class _ClaveForanea extends EntityValues {
  protected $id = UNDEFINED;
  protected $entidad = UNDEFINED;
  protected $campo = UNDEFINED;

  public function _setDefault(){
    $this->setId(DEFAULT_VALUE);
    $this->setEntidad(DEFAULT_VALUE);
    $this->setCampo(DEFAULT_VALUE);
  }

  public function _fromArray(array $row = NULL, $p = ""){
    if(empty($row)) return;
    if(isset($row[$p."id"])) $this->setId($row[$p."id"]);
    if(isset($row[$p."entidad"])) $this->setEntidad($row[$p."entidad"]);
    if(isset($row[$p."campo"])) $this->setCampo($row[$p."campo"]);
  }

  public function _toArray(){
    $row = [];
    if($this->id !== UNDEFINED) $row["id"] = $this->id();
    if($this->entidad !== UNDEFINED) $row["entidad"] = $this->entidad();
    if($this->campo !== UNDEFINED) $row["campo"] = $this->campo();
    return $row;
  }

  public function _isEmpty(){
    if(!Validation::is_empty($this->id)) return false;
    if(!Validation::is_empty($this->entidad)) return false;
    if(!Validation::is_empty($this->campo)) return false;
    return true;
  }

  public function id() { return $this->id; }
  public function entidad($format = null) { return Format::convertCase($this->entidad, $format); }
  public function campo($format = null) { return Format::convertCase($this->campo, $format); }
  public function setId($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkId($p); 
    if($check) $this->id = $p;
    return $check;
  }

  public function setEntidad($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkEntidad($p); 
    if($check) $this->entidad = $p;
    return $check;
  }

  public function setCampo($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkCampo($p); 
    if($check) $this->campo = $p;
    return $check;
  }

  public function checkId($value) { 
      return true; 
  }

  public function checkEntidad($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("entidad", $v);
  }

  public function checkCampo($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("campo", $v);
  }



}
