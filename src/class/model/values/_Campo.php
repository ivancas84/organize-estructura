<?php

require_once("class/tools/Format.php");
require_once("class/model/Values.php");

class _Campo extends EntityValues {
  protected $id = UNDEFINED;
  protected $nombre = UNDEFINED;
  protected $alias = UNDEFINED;
  protected $valorDefecto = UNDEFINED;
  protected $longitud = UNDEFINED;
  protected $longitudMinima = UNDEFINED;
  protected $noNulo = UNDEFINED;
  protected $unico = UNDEFINED;
  protected $principal = UNDEFINED;
  protected $tipoDato = UNDEFINED;
  protected $tipoCampo = UNDEFINED;
  protected $subtipo = UNDEFINED;
  protected $creado = UNDEFINED;
  protected $entidad = UNDEFINED;

  public function _setDefault(){
    $this->setId(DEFAULT_VALUE);
    $this->setNombre(DEFAULT_VALUE);
    $this->setAlias(DEFAULT_VALUE);
    $this->setValorDefecto(DEFAULT_VALUE);
    $this->setLongitud(DEFAULT_VALUE);
    $this->setLongitudMinima(DEFAULT_VALUE);
    $this->setNoNulo(DEFAULT_VALUE);
    $this->setUnico(DEFAULT_VALUE);
    $this->setPrincipal(DEFAULT_VALUE);
    $this->setTipoDato(DEFAULT_VALUE);
    $this->setTipoCampo(DEFAULT_VALUE);
    $this->setSubtipo(DEFAULT_VALUE);
    $this->setCreado(DEFAULT_VALUE);
    $this->setEntidad(DEFAULT_VALUE);
  }

  public function _fromArray(array $row = NULL, $p = ""){
    if(empty($row)) return;
    if(isset($row[$p."id"])) $this->setId($row[$p."id"]);
    if(isset($row[$p."nombre"])) $this->setNombre($row[$p."nombre"]);
    if(isset($row[$p."alias"])) $this->setAlias($row[$p."alias"]);
    if(isset($row[$p."valor_defecto"])) $this->setValorDefecto($row[$p."valor_defecto"]);
    if(isset($row[$p."longitud"])) $this->setLongitud($row[$p."longitud"]);
    if(isset($row[$p."longitud_minima"])) $this->setLongitudMinima($row[$p."longitud_minima"]);
    if(isset($row[$p."no_nulo"])) $this->setNoNulo($row[$p."no_nulo"]);
    if(isset($row[$p."unico"])) $this->setUnico($row[$p."unico"]);
    if(isset($row[$p."principal"])) $this->setPrincipal($row[$p."principal"]);
    if(isset($row[$p."tipo_dato"])) $this->setTipoDato($row[$p."tipo_dato"]);
    if(isset($row[$p."tipo_campo"])) $this->setTipoCampo($row[$p."tipo_campo"]);
    if(isset($row[$p."subtipo"])) $this->setSubtipo($row[$p."subtipo"]);
    if(isset($row[$p."creado"])) $this->setCreado($row[$p."creado"]);
    if(isset($row[$p."entidad"])) $this->setEntidad($row[$p."entidad"]);
  }

  public function _toArray(){
    $row = [];
    if($this->id !== UNDEFINED) $row["id"] = $this->id();
    if($this->nombre !== UNDEFINED) $row["nombre"] = $this->nombre();
    if($this->alias !== UNDEFINED) $row["alias"] = $this->alias();
    if($this->valorDefecto !== UNDEFINED) $row["valor_defecto"] = $this->valorDefecto();
    if($this->longitud !== UNDEFINED) $row["longitud"] = $this->longitud();
    if($this->longitudMinima !== UNDEFINED) $row["longitud_minima"] = $this->longitudMinima();
    if($this->noNulo !== UNDEFINED) $row["no_nulo"] = $this->noNulo();
    if($this->unico !== UNDEFINED) $row["unico"] = $this->unico();
    if($this->principal !== UNDEFINED) $row["principal"] = $this->principal();
    if($this->tipoDato !== UNDEFINED) $row["tipo_dato"] = $this->tipoDato();
    if($this->tipoCampo !== UNDEFINED) $row["tipo_campo"] = $this->tipoCampo();
    if($this->subtipo !== UNDEFINED) $row["subtipo"] = $this->subtipo();
    if($this->creado !== UNDEFINED) $row["creado"] = $this->creado("Y-m-d H:i:s");
    if($this->entidad !== UNDEFINED) $row["entidad"] = $this->entidad();
    return $row;
  }

  public function _isEmpty(){
    if(!Validation::is_empty($this->id)) return false;
    if(!Validation::is_empty($this->nombre)) return false;
    if(!Validation::is_empty($this->alias)) return false;
    if(!Validation::is_empty($this->valorDefecto)) return false;
    if(!Validation::is_empty($this->longitud)) return false;
    if(!Validation::is_empty($this->longitudMinima)) return false;
    if(!Validation::is_empty($this->noNulo)) return false;
    if(!Validation::is_empty($this->unico)) return false;
    if(!Validation::is_empty($this->principal)) return false;
    if(!Validation::is_empty($this->tipoDato)) return false;
    if(!Validation::is_empty($this->tipoCampo)) return false;
    if(!Validation::is_empty($this->subtipo)) return false;
    if(!Validation::is_empty($this->creado)) return false;
    if(!Validation::is_empty($this->entidad)) return false;
    return true;
  }

  public function id() { return $this->id; }
  public function nombre($format = null) { return Format::convertCase($this->nombre, $format); }
  public function alias($format = null) { return Format::convertCase($this->alias, $format); }
  public function valorDefecto($format = null) { return Format::convertCase($this->valorDefecto, $format); }
  public function longitud() { return $this->longitud; }
  public function longitudMinima() { return $this->longitudMinima; }
  public function noNulo($format = null) { return Format::boolean($this->noNulo, $format); }
  public function unico($format = null) { return Format::boolean($this->unico, $format); }
  public function principal($format = null) { return Format::boolean($this->principal, $format); }
  public function tipoDato($format = null) { return Format::convertCase($this->tipoDato, $format); }
  public function tipoCampo($format = null) { return Format::convertCase($this->tipoCampo, $format); }
  public function subtipo($format = null) { return Format::convertCase($this->subtipo, $format); }
  public function creado($format = null) { return Format::date($this->creado, $format); }
  public function entidad($format = null) { return Format::convertCase($this->entidad, $format); }
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

  public function setValorDefecto($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkValorDefecto($p); 
    if($check) $this->valorDefecto = $p;
    return $check;
  }

  public function setLongitud($p) {
    if ($p == DEFAULT_VALUE) $p = null;
    $p = (is_null($p)) ? null : intval(trim($p));
    $check = $this->checkLongitud($p); 
    if($check) $this->longitud = $p;
    return $check;
  }

  public function setLongitudMinima($p) {
    if ($p == DEFAULT_VALUE) $p = null;
    $p = (is_null($p)) ? null : intval(trim($p));
    $check = $this->checkLongitudMinima($p); 
    if($check) $this->longitudMinima = $p;
    return $check;
  }

  public function setNoNulo($p) {
    if ($p == DEFAULT_VALUE) $p = null;
    $p = (is_null($p)) ? null : settypebool(trim($p));
    $check = $this->checkNoNulo($p); 
    if($check) $this->noNulo = $p;
    return $check;
  }

  public function setUnico($p) {
    if ($p == DEFAULT_VALUE) $p = null;
    $p = (is_null($p)) ? null : settypebool(trim($p));
    $check = $this->checkUnico($p); 
    if($check) $this->unico = $p;
    return $check;
  }

  public function setPrincipal($p) {
    if ($p == DEFAULT_VALUE) $p = null;
    $p = (is_null($p)) ? null : settypebool(trim($p));
    $check = $this->checkPrincipal($p); 
    if($check) $this->principal = $p;
    return $check;
  }

  public function setTipoDato($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkTipoDato($p); 
    if($check) $this->tipoDato = $p;
    return $check;
  }

  public function setTipoCampo($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkTipoCampo($p); 
    if($check) $this->tipoCampo = $p;
    return $check;
  }

  public function setSubtipo($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkSubtipo($p); 
    if($check) $this->subtipo = $p;
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

  public function setEntidad($p) {
    $p = ($p == DEFAULT_VALUE) ? null : trim($p);
    $p = (is_null($p)) ? null : (string)$p;
    $check = $this->checkEntidad($p); 
    if($check) $this->entidad = $p;
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

  public function checkValorDefecto($value) { 
    $v = Validation::getInstanceValue($value)->string();
    return $this->_setLogsValidation("valor_defecto", $v);
  }

  public function checkLongitud($value) { 
    $v = Validation::getInstanceValue($value)->integer();
    return $this->_setLogsValidation("longitud", $v);
  }

  public function checkLongitudMinima($value) { 
    $v = Validation::getInstanceValue($value)->integer();
    return $this->_setLogsValidation("longitud_minima", $v);
  }

  public function checkNoNulo($value) { 
    $v = Validation::getInstanceValue($value)->boolean()->required();
    return $this->_setLogsValidation("no_nulo", $v);
  }

  public function checkUnico($value) { 
    $v = Validation::getInstanceValue($value)->boolean()->required();
    return $this->_setLogsValidation("unico", $v);
  }

  public function checkPrincipal($value) { 
    $v = Validation::getInstanceValue($value)->boolean();
    return $this->_setLogsValidation("principal", $v);
  }

  public function checkTipoDato($value) { 
    $v = Validation::getInstanceValue($value)->string();
    return $this->_setLogsValidation("tipo_dato", $v);
  }

  public function checkTipoCampo($value) { 
    $v = Validation::getInstanceValue($value)->string();
    return $this->_setLogsValidation("tipo_campo", $v);
  }

  public function checkSubtipo($value) { 
    $v = Validation::getInstanceValue($value)->string();
    return $this->_setLogsValidation("subtipo", $v);
  }

  public function checkCreado($value) { 
    $v = Validation::getInstanceValue($value)->date();
    return $this->_setLogsValidation("creado", $v);
  }

  public function checkEntidad($value) { 
    $v = Validation::getInstanceValue($value)->string()->required();
    return $this->_setLogsValidation("entidad", $v);
  }



}
