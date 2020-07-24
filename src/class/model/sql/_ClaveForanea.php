<?php
require_once("class/model/Sql.php");

class _ClaveForaneaSql extends EntitySql{

  public function __construct(){
    parent::__construct();
    $this->entity = Entity::getInstanceRequire('clave_foranea');
  }


  public function _mappingField($field){
    $p = $this->prf();
    $t = $this->prt();

    if($f = $this->_mappingFieldMain($field)) return $f;
    switch ($field) {
      case $p.'id': return $t.".id";
      case $p.'entidad': return $t.".entidad";
      case $p.'campo': return $t.".campo";

      case $p.'min_id': return "MIN({$t}.id)";
      case $p.'max_id': return "MAX({$t}.id)";
      case $p.'count_id': return "COUNT({$t}.id)";

      case $p.'min_entidad': return "MIN({$t}.entidad)";
      case $p.'max_entidad': return "MAX({$t}.entidad)";
      case $p.'count_entidad': return "COUNT({$t}.entidad)";

      case $p.'min_campo': return "MIN({$t}.campo)";
      case $p.'max_campo': return "MAX({$t}.campo)";
      case $p.'count_campo': return "COUNT({$t}.campo)";

      case $p.'_label': return "CONCAT_WS(' ',
{$t}.id
)";
      default: return null;
    }
  }

  public function mappingField($field){
    if($f = $this->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('entidad', 'ent')->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('sistema', 'ent_sis')->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('campo', 'cam')->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('entidad', 'cam_ent')->_mappingField($field)) return $f;
    if($f = EntitySql::getInstanceRequire('sistema', 'cam_ent_sis')->_mappingField($field)) return $f;
    throw new Exception("Campo no reconocido para {$this->entity->getName()}: {$field}");
  }

  public function _fields(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ' AS ' . $p.'id, ' . $this->_mappingField($p.'entidad') . ' AS ' . $p.'entidad, ' . $this->_mappingField($p.'campo') . ' AS ' . $p.'campo';
  }

  public function _fieldsDb(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ', ' . $this->_mappingField($p.'entidad') . ', ' . $this->_mappingField($p.'campo') . '';
  }

  public function fields(){
    return $this->_fields() . ',
' . EntitySql::getInstanceRequire('entidad', 'ent')->_fields() . ',
' . EntitySql::getInstanceRequire('sistema', 'ent_sis')->_fields() . ',
' . EntitySql::getInstanceRequire('campo', 'cam')->_fields() . ',
' . EntitySql::getInstanceRequire('entidad', 'cam_ent')->_fields() . ',
' . EntitySql::getInstanceRequire('sistema', 'cam_ent_sis')->_fields() . ' 
';
  }

  public function join(Render $render){
    return EntitySql::getInstanceRequire('entidad', 'ent')->_join('entidad', 'cf', $render) . '
' . EntitySql::getInstanceRequire('sistema', 'ent_sis')->_join('sistema', 'ent', $render) . '
' . EntitySql::getInstanceRequire('campo', 'cam')->_join('campo', 'cf', $render) . '
' . EntitySql::getInstanceRequire('entidad', 'cam_ent')->_join('entidad', 'cam', $render) . '
' . EntitySql::getInstanceRequire('sistema', 'cam_ent_sis')->_join('sistema', 'cam_ent', $render) . '
' ;
  }

  public function _conditionFieldStruct($field, $option, $value){
    $p = $this->prf();

    $f = $this->_mappingField($field);
    switch ($field){
      case "{$p}id": return $this->format->conditionText($f, $value, $option);
      case "{$p}entidad": return $this->format->conditionText($f, $value, $option);
      case "{$p}campo": return $this->format->conditionText($f, $value, $option);

      case "{$p}max_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_id": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_entidad": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_entidad": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_entidad": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_campo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_campo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_campo": return $this->format->conditionNumber($f, $value, $option);

      default: return $this->_conditionFieldStructMain($field, $option, $value);
    }
  }

  protected function conditionFieldStruct($field, $option, $value) {
    if($c = $this->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','ent')->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','ent_sis')->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('campo','cam')->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','cam_ent')->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','cam_ent_sis')->_conditionFieldStruct($field, $option, $value)) return $c;
  }

  protected function conditionFieldAux($field, $option, $value) {
    if($c = $this->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','ent')->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','ent_sis')->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('campo','cam')->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','cam_ent')->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','cam_ent_sis')->_conditionFieldAux($field, $option, $value)) return $c;
  }

  public function initializeInsert(array $data){
    $data['id'] = (!empty($data['id'])) ? $data['id'] : Ma::nextId('clave_foranea');
    if(empty($data['entidad'])) throw new Exception('dato obligatorio sin valor: entidad');
    if(empty($data['campo'])) throw new Exception('dato obligatorio sin valor: campo');

    return $data;
  }


  public function initializeUpdate(array $data){
    if(array_key_exists('id', $data)) { if(is_null($data['id']) || $data['id'] == "") throw new Exception('dato obligatorio sin valor: id'); }
    if(array_key_exists('entidad', $data)) { if(!isset($data['entidad']) || ($data['entidad'] == '')) throw new Exception('dato obligatorio sin valor: entidad'); }
    if(array_key_exists('campo', $data)) { if(!isset($data['campo']) || ($data['campo'] == '')) throw new Exception('dato obligatorio sin valor: campo'); }

    return $data;
  }


  public function format(array $row){
    $row_ = array();
   if(isset($row['id']) )  $row_['id'] = $this->format->escapeString($row['id']);
    if(isset($row['entidad'])) $row_['entidad'] = $this->format->escapeString($row['entidad']);
    if(isset($row['campo'])) $row_['campo'] = $this->format->escapeString($row['campo']);

    return $row_;
  }
  public function _json(array $row = NULL){
    if(empty($row)) return null;
    $prefix = $this->prf();
    $row_ = [];
    $row_["id"] = (is_null($row[$prefix . "id"])) ? null : (string)$row[$prefix . "id"]; //la pk se trata como string debido a un comportamiento erratico en angular 2 que al tratarlo como integer resta 1 en el valor
    $row_["entidad"] = (is_null($row[$prefix . "entidad"])) ? null : (string)$row[$prefix . "entidad"]; //las fk se transforman a string debido a un comportamiento errantico en angular 2 que al tratarlo como integer resta 1 en el valor
    $row_["campo"] = (is_null($row[$prefix . "campo"])) ? null : (string)$row[$prefix . "campo"]; //las fk se transforman a string debido a un comportamiento errantico en angular 2 que al tratarlo como integer resta 1 en el valor
    return $row_;
  }



}
