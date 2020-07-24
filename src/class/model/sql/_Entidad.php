<?php
require_once("class/model/Sql.php");

class _EntidadSql extends EntitySql{

  public function __construct(){
    parent::__construct();
    $this->entity = Entity::getInstanceRequire('entidad');
  }


  public function _mappingField($field){
    $p = $this->prf();
    $t = $this->prt();

    if($f = $this->_mappingFieldMain($field)) return $f;
    switch ($field) {
      case $p.'id': return $t.".id";
      case $p.'nombre': return $t.".nombre";
      case $p.'alias': return $t.".alias";
      case $p.'sistema': return $t.".sistema";

      case $p.'min_id': return "MIN({$t}.id)";
      case $p.'max_id': return "MAX({$t}.id)";
      case $p.'count_id': return "COUNT({$t}.id)";

      case $p.'min_nombre': return "MIN({$t}.nombre)";
      case $p.'max_nombre': return "MAX({$t}.nombre)";
      case $p.'count_nombre': return "COUNT({$t}.nombre)";

      case $p.'min_alias': return "MIN({$t}.alias)";
      case $p.'max_alias': return "MAX({$t}.alias)";
      case $p.'count_alias': return "COUNT({$t}.alias)";

      case $p.'min_sistema': return "MIN({$t}.sistema)";
      case $p.'max_sistema': return "MAX({$t}.sistema)";
      case $p.'count_sistema': return "COUNT({$t}.sistema)";

      case $p.'_label': return "CONCAT_WS(' ',
{$t}.id
)";
      default: return null;
    }
  }

  public function mappingField($field){
    if($f = $this->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('sistema', 'sis')->_mappingField($field)) return $f;
    throw new Exception("Campo no reconocido para {$this->entity->getName()}: {$field}");
  }

  public function _fields(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ' AS ' . $p.'id, ' . $this->_mappingField($p.'nombre') . ' AS ' . $p.'nombre, ' . $this->_mappingField($p.'alias') . ' AS ' . $p.'alias, ' . $this->_mappingField($p.'sistema') . ' AS ' . $p.'sistema';
  }

  public function _fieldsDb(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ', ' . $this->_mappingField($p.'nombre') . ', ' . $this->_mappingField($p.'alias') . ', ' . $this->_mappingField($p.'sistema') . '';
  }

  public function fields(){
    return $this->_fields() . ',
' . EntitySql::getInstanceRequire('sistema', 'sis')->_fields() . ' 
';
  }

  public function join(Render $render){
    return EntitySql::getInstanceRequire('sistema', 'sis')->_join('sistema', 'enti', $render) . '
' ;
  }

  public function _conditionFieldStruct($field, $option, $value){
    $p = $this->prf();

    $f = $this->_mappingField($field);
    switch ($field){
      case "{$p}id": return $this->format->conditionText($f, $value, $option);
      case "{$p}nombre": return $this->format->conditionText($f, $value, $option);
      case "{$p}alias": return $this->format->conditionText($f, $value, $option);
      case "{$p}sistema": return $this->format->conditionText($f, $value, $option);

      case "{$p}max_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_id": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_nombre": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_nombre": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_nombre": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_alias": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_alias": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_alias": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_sistema": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_sistema": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_sistema": return $this->format->conditionNumber($f, $value, $option);

      default: return $this->_conditionFieldStructMain($field, $option, $value);
    }
  }

  protected function conditionFieldStruct($field, $option, $value) {
    if($c = $this->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','sis')->_conditionFieldStruct($field, $option, $value)) return $c;
  }

  protected function conditionFieldAux($field, $option, $value) {
    if($c = $this->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','sis')->_conditionFieldAux($field, $option, $value)) return $c;
  }

  public function initializeInsert(array $data){
    $data['id'] = (!empty($data['id'])) ? $data['id'] : Ma::nextId('entidad');
    if(!isset($data['nombre']) || is_null($data['nombre']) || $data['nombre'] == "") throw new Exception('dato obligatorio sin valor: nombre');
    if(!isset($data['alias']) || is_null($data['alias']) || $data['alias'] == "") throw new Exception('dato obligatorio sin valor: alias');
    if(empty($data['sistema'])) throw new Exception('dato obligatorio sin valor: sistema');

    return $data;
  }


  public function initializeUpdate(array $data){
    if(array_key_exists('id', $data)) { if(is_null($data['id']) || $data['id'] == "") throw new Exception('dato obligatorio sin valor: id'); }
    if(array_key_exists('nombre', $data)) { if(is_null($data['nombre']) || $data['nombre'] == "") throw new Exception('dato obligatorio sin valor: nombre'); }
    if(array_key_exists('alias', $data)) { if(is_null($data['alias']) || $data['alias'] == "") throw new Exception('dato obligatorio sin valor: alias'); }
    if(array_key_exists('sistema', $data)) { if(!isset($data['sistema']) || ($data['sistema'] == '')) throw new Exception('dato obligatorio sin valor: sistema'); }

    return $data;
  }


  public function format(array $row){
    $row_ = array();
   if(isset($row['id']) )  $row_['id'] = $this->format->escapeString($row['id']);
    if(isset($row['nombre'])) $row_['nombre'] = $this->format->escapeString($row['nombre']);
    if(isset($row['alias'])) $row_['alias'] = $this->format->escapeString($row['alias']);
    if(isset($row['sistema'])) $row_['sistema'] = $this->format->escapeString($row['sistema']);

    return $row_;
  }
  public function _json(array $row = NULL){
    if(empty($row)) return null;
    $prefix = $this->prf();
    $row_ = [];
    $row_["id"] = (is_null($row[$prefix . "id"])) ? null : (string)$row[$prefix . "id"]; //la pk se trata como string debido a un comportamiento erratico en angular 2 que al tratarlo como integer resta 1 en el valor
    $row_["nombre"] = (is_null($row[$prefix . "nombre"])) ? null : (string)$row[$prefix . "nombre"];
    $row_["alias"] = (is_null($row[$prefix . "alias"])) ? null : (string)$row[$prefix . "alias"];
    $row_["sistema"] = (is_null($row[$prefix . "sistema"])) ? null : (string)$row[$prefix . "sistema"]; //las fk se transforman a string debido a un comportamiento errantico en angular 2 que al tratarlo como integer resta 1 en el valor
    return $row_;
  }



}
