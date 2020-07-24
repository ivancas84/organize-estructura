<?php
require_once("class/model/Sql.php");

class _CampoSql extends EntitySql{

  public function __construct(){
    parent::__construct();
    $this->entity = Entity::getInstanceRequire('campo');
  }


  public function _mappingField($field){
    $p = $this->prf();
    $t = $this->prt();

    if($f = $this->_mappingFieldMain($field)) return $f;
    switch ($field) {
      case $p.'id': return $t.".id";
      case $p.'nombre': return $t.".nombre";
      case $p.'alias': return $t.".alias";
      case $p.'valor_defecto': return $t.".valor_defecto";
      case $p.'longitud': return $t.".longitud";
      case $p.'longitud_minima': return $t.".longitud_minima";
      case $p.'no_nulo': return $t.".no_nulo";
      case $p.'unico': return $t.".unico";
      case $p.'principal': return $t.".principal";
      case $p.'tipo_dato': return $t.".tipo_dato";
      case $p.'tipo_campo': return $t.".tipo_campo";
      case $p.'subtipo': return $t.".subtipo";
      case $p.'creado': return $t.".creado";
      case $p.'entidad': return $t.".entidad";

      case $p.'min_id': return "MIN({$t}.id)";
      case $p.'max_id': return "MAX({$t}.id)";
      case $p.'count_id': return "COUNT({$t}.id)";

      case $p.'min_nombre': return "MIN({$t}.nombre)";
      case $p.'max_nombre': return "MAX({$t}.nombre)";
      case $p.'count_nombre': return "COUNT({$t}.nombre)";

      case $p.'min_alias': return "MIN({$t}.alias)";
      case $p.'max_alias': return "MAX({$t}.alias)";
      case $p.'count_alias': return "COUNT({$t}.alias)";

      case $p.'min_valor_defecto': return "MIN({$t}.valor_defecto)";
      case $p.'max_valor_defecto': return "MAX({$t}.valor_defecto)";
      case $p.'count_valor_defecto': return "COUNT({$t}.valor_defecto)";

      case $p.'sum_longitud': return "SUM({$t}.longitud)";
      case $p.'avg_longitud': return "AVG({$t}.longitud)";
      case $p.'min_longitud': return "MIN({$t}.longitud)";
      case $p.'max_longitud': return "MAX({$t}.longitud)";
      case $p.'count_longitud': return "COUNT({$t}.longitud)";

      case $p.'sum_longitud_minima': return "SUM({$t}.longitud_minima)";
      case $p.'avg_longitud_minima': return "AVG({$t}.longitud_minima)";
      case $p.'min_longitud_minima': return "MIN({$t}.longitud_minima)";
      case $p.'max_longitud_minima': return "MAX({$t}.longitud_minima)";
      case $p.'count_longitud_minima': return "COUNT({$t}.longitud_minima)";

      case $p.'min_no_nulo': return "MIN({$t}.no_nulo)";
      case $p.'max_no_nulo': return "MAX({$t}.no_nulo)";
      case $p.'count_no_nulo': return "COUNT({$t}.no_nulo)";

      case $p.'min_unico': return "MIN({$t}.unico)";
      case $p.'max_unico': return "MAX({$t}.unico)";
      case $p.'count_unico': return "COUNT({$t}.unico)";

      case $p.'min_principal': return "MIN({$t}.principal)";
      case $p.'max_principal': return "MAX({$t}.principal)";
      case $p.'count_principal': return "COUNT({$t}.principal)";

      case $p.'min_tipo_dato': return "MIN({$t}.tipo_dato)";
      case $p.'max_tipo_dato': return "MAX({$t}.tipo_dato)";
      case $p.'count_tipo_dato': return "COUNT({$t}.tipo_dato)";

      case $p.'min_tipo_campo': return "MIN({$t}.tipo_campo)";
      case $p.'max_tipo_campo': return "MAX({$t}.tipo_campo)";
      case $p.'count_tipo_campo': return "COUNT({$t}.tipo_campo)";

      case $p.'min_subtipo': return "MIN({$t}.subtipo)";
      case $p.'max_subtipo': return "MAX({$t}.subtipo)";
      case $p.'count_subtipo': return "COUNT({$t}.subtipo)";

      case $p.'avg_creado': return "AVG({$t}.creado)";
      case $p.'min_creado': return "MIN({$t}.creado)";
      case $p.'max_creado': return "MAX({$t}.creado)";
      case $p.'count_creado': return "COUNT({$t}.creado)";

      case $p.'min_entidad': return "MIN({$t}.entidad)";
      case $p.'max_entidad': return "MAX({$t}.entidad)";
      case $p.'count_entidad': return "COUNT({$t}.entidad)";

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
    throw new Exception("Campo no reconocido para {$this->entity->getName()}: {$field}");
  }

  public function _fields(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ' AS ' . $p.'id, ' . $this->_mappingField($p.'nombre') . ' AS ' . $p.'nombre, ' . $this->_mappingField($p.'alias') . ' AS ' . $p.'alias, ' . $this->_mappingField($p.'valor_defecto') . ' AS ' . $p.'valor_defecto, ' . $this->_mappingField($p.'longitud') . ' AS ' . $p.'longitud, ' . $this->_mappingField($p.'longitud_minima') . ' AS ' . $p.'longitud_minima, ' . $this->_mappingField($p.'no_nulo') . ' AS ' . $p.'no_nulo, ' . $this->_mappingField($p.'unico') . ' AS ' . $p.'unico, ' . $this->_mappingField($p.'principal') . ' AS ' . $p.'principal, ' . $this->_mappingField($p.'tipo_dato') . ' AS ' . $p.'tipo_dato, ' . $this->_mappingField($p.'tipo_campo') . ' AS ' . $p.'tipo_campo, ' . $this->_mappingField($p.'subtipo') . ' AS ' . $p.'subtipo, ' . $this->_mappingField($p.'creado') . ' AS ' . $p.'creado, ' . $this->_mappingField($p.'entidad') . ' AS ' . $p.'entidad';
  }

  public function _fieldsDb(){
    //No todos los campos se extraen de la entidad, por eso es necesario mapearlos
    $p = $this->prf();
    return '
' . $this->_mappingField($p.'id') . ', ' . $this->_mappingField($p.'nombre') . ', ' . $this->_mappingField($p.'alias') . ', ' . $this->_mappingField($p.'valor_defecto') . ', ' . $this->_mappingField($p.'longitud') . ', ' . $this->_mappingField($p.'longitud_minima') . ', ' . $this->_mappingField($p.'no_nulo') . ', ' . $this->_mappingField($p.'unico') . ', ' . $this->_mappingField($p.'principal') . ', ' . $this->_mappingField($p.'tipo_dato') . ', ' . $this->_mappingField($p.'tipo_campo') . ', ' . $this->_mappingField($p.'subtipo') . ', ' . $this->_mappingField($p.'creado') . ', ' . $this->_mappingField($p.'entidad') . '';
  }

  public function fields(){
    return $this->_fields() . ',
' . EntitySql::getInstanceRequire('entidad', 'ent')->_fields() . ',
' . EntitySql::getInstanceRequire('sistema', 'ent_sis')->_fields() . ' 
';
  }

  public function join(Render $render){
    return EntitySql::getInstanceRequire('entidad', 'ent')->_join('entidad', 'camp', $render) . '
' . EntitySql::getInstanceRequire('sistema', 'ent_sis')->_join('sistema', 'ent', $render) . '
' ;
  }

  public function _conditionFieldStruct($field, $option, $value){
    $p = $this->prf();

    $f = $this->_mappingField($field);
    switch ($field){
      case "{$p}id": return $this->format->conditionText($f, $value, $option);
      case "{$p}nombre": return $this->format->conditionText($f, $value, $option);
      case "{$p}alias": return $this->format->conditionText($f, $value, $option);
      case "{$p}valor_defecto": return $this->format->conditionText($f, $value, $option);
      case "{$p}longitud": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}longitud_minima": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}no_nulo": return $this->format->conditionBoolean($f, $value);
      case "{$p}unico": return $this->format->conditionBoolean($f, $value);
      case "{$p}principal": return $this->format->conditionBoolean($f, $value);
      case "{$p}tipo_dato": return $this->format->conditionText($f, $value, $option);
      case "{$p}tipo_campo": return $this->format->conditionText($f, $value, $option);
      case "{$p}subtipo": return $this->format->conditionText($f, $value, $option);
      case "{$p}creado": return $this->format->conditionTimestamp($f, $value, $option);
      case "{$p}entidad": return $this->format->conditionText($f, $value, $option);

      case "{$p}max_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_id": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_id": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_nombre": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_nombre": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_nombre": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_alias": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_alias": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_alias": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_valor_defecto": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_valor_defecto": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_valor_defecto": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}sum_longitud": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}avg_longitud": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}max_longitud": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_longitud": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_longitud": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}sum_longitud_minima": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}avg_longitud_minima": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}max_longitud_minima": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_longitud_minima": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_longitud_minima": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_no_nulo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_no_nulo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_no_nulo": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_unico": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_unico": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_unico": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_principal": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_principal": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_principal": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_tipo_dato": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_tipo_dato": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_tipo_dato": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_tipo_campo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_tipo_campo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_tipo_campo": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_subtipo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_subtipo": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_subtipo": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}avg_creado": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}max_creado": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_creado": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_creado": return $this->format->conditionNumber($f, $value, $option);

      case "{$p}max_entidad": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}min_entidad": return $this->format->conditionNumber($f, $value, $option);
      case "{$p}count_entidad": return $this->format->conditionNumber($f, $value, $option);

      default: return $this->_conditionFieldStructMain($field, $option, $value);
    }
  }

  protected function conditionFieldStruct($field, $option, $value) {
    if($c = $this->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','ent')->_conditionFieldStruct($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','ent_sis')->_conditionFieldStruct($field, $option, $value)) return $c;
  }

  protected function conditionFieldAux($field, $option, $value) {
    if($c = $this->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('entidad','ent')->_conditionFieldAux($field, $option, $value)) return $c;
    if($c = EntitySql::getInstanceRequire('sistema','ent_sis')->_conditionFieldAux($field, $option, $value)) return $c;
  }

  public function initializeInsert(array $data){
    $data['id'] = (!empty($data['id'])) ? $data['id'] : Ma::nextId('campo');
    if(!isset($data['nombre']) || is_null($data['nombre']) || $data['nombre'] == "") throw new Exception('dato obligatorio sin valor: nombre');
    if(!isset($data['alias']) || is_null($data['alias']) || $data['alias'] == "") throw new Exception('dato obligatorio sin valor: alias');
    if(!isset($data['valor_defecto']) || is_null($data['valor_defecto']) || $data['valor_defecto'] == "") $data['valor_defecto'] = "null";
    if(!isset($data['longitud']) || ($data['longitud'] == '')) $data['longitud'] = "null";
    if(!isset($data['longitud_minima']) || ($data['longitud_minima'] == '')) $data['longitud_minima'] = "null";
    if(!isset($data['no_nulo']) || ($data['no_nulo'] == '')) $data['no_nulo'] = "false";
    if(!isset($data['unico']) || ($data['unico'] == '')) $data['unico'] = "false";
    if(!isset($data['principal']) || ($data['principal'] == '')) $data['principal'] = "false";
    if(!isset($data['tipo_dato']) || is_null($data['tipo_dato']) || $data['tipo_dato'] == "") $data['tipo_dato'] = "null";
    if(!isset($data['tipo_campo']) || is_null($data['tipo_campo']) || $data['tipo_campo'] == "") $data['tipo_campo'] = "null";
    if(!isset($data['subtipo']) || is_null($data['subtipo']) || $data['subtipo'] == "") $data['subtipo'] = "null";
    if(!isset($data['creado']))  $data['creado'] = date("Y-m-d H:i:s");
    if(empty($data['entidad'])) throw new Exception('dato obligatorio sin valor: entidad');

    return $data;
  }


  public function initializeUpdate(array $data){
    if(array_key_exists('id', $data)) { if(is_null($data['id']) || $data['id'] == "") throw new Exception('dato obligatorio sin valor: id'); }
    if(array_key_exists('nombre', $data)) { if(is_null($data['nombre']) || $data['nombre'] == "") throw new Exception('dato obligatorio sin valor: nombre'); }
    if(array_key_exists('alias', $data)) { if(is_null($data['alias']) || $data['alias'] == "") throw new Exception('dato obligatorio sin valor: alias'); }
    if(array_key_exists('valor_defecto', $data)) { if(is_null($data['valor_defecto']) || $data['valor_defecto'] == "") $data['valor_defecto'] = "null"; }
    if(array_key_exists('longitud', $data)) { if(!isset($data['longitud']) || ($data['longitud'] == '')) $data['longitud'] = "null"; }
    if(array_key_exists('longitud_minima', $data)) { if(!isset($data['longitud_minima']) || ($data['longitud_minima'] == '')) $data['longitud_minima'] = "null"; }
    if(array_key_exists('no_nulo', $data)) { if(!isset($data['no_nulo']) || ($data['no_nulo'] == '')) $data['no_nulo'] = "false"; }
    if(array_key_exists('unico', $data)) { if(!isset($data['unico']) || ($data['unico'] == '')) $data['unico'] = "false"; }
    if(array_key_exists('principal', $data)) { if(!isset($data['principal']) || ($data['principal'] == '')) $data['principal'] = "false"; }
    if(array_key_exists('tipo_dato', $data)) { if(is_null($data['tipo_dato']) || $data['tipo_dato'] == "") $data['tipo_dato'] = "null"; }
    if(array_key_exists('tipo_campo', $data)) { if(is_null($data['tipo_campo']) || $data['tipo_campo'] == "") $data['tipo_campo'] = "null"; }
    if(array_key_exists('subtipo', $data)) { if(is_null($data['subtipo']) || $data['subtipo'] == "") $data['subtipo'] = "null"; }
    if(array_key_exists('creado', $data)) { if(empty($data['creado']))  $data['creado'] = date("Y-m-d H:i:s"); }
    if(array_key_exists('entidad', $data)) { if(!isset($data['entidad']) || ($data['entidad'] == '')) throw new Exception('dato obligatorio sin valor: entidad'); }

    return $data;
  }


  public function format(array $row){
    $row_ = array();
   if(isset($row['id']) )  $row_['id'] = $this->format->escapeString($row['id']);
    if(isset($row['nombre'])) $row_['nombre'] = $this->format->escapeString($row['nombre']);
    if(isset($row['alias'])) $row_['alias'] = $this->format->escapeString($row['alias']);
    if(isset($row['valor_defecto'])) $row_['valor_defecto'] = $this->format->escapeString($row['valor_defecto']);
    if(isset($row['longitud'])) $row_['longitud'] = $this->format->numeric($row['longitud']);
    if(isset($row['longitud_minima'])) $row_['longitud_minima'] = $this->format->numeric($row['longitud_minima']);
    if(isset($row['no_nulo'])) $row_['no_nulo'] = $this->format->boolean($row['no_nulo']);
    if(isset($row['unico'])) $row_['unico'] = $this->format->boolean($row['unico']);
    if(isset($row['principal'])) $row_['principal'] = $this->format->boolean($row['principal']);
    if(isset($row['tipo_dato'])) $row_['tipo_dato'] = $this->format->escapeString($row['tipo_dato']);
    if(isset($row['tipo_campo'])) $row_['tipo_campo'] = $this->format->escapeString($row['tipo_campo']);
    if(isset($row['subtipo'])) $row_['subtipo'] = $this->format->escapeString($row['subtipo']);
    if(isset($row['creado'])) $row_['creado'] = $this->format->timestamp($row['creado']);
    if(isset($row['entidad'])) $row_['entidad'] = $this->format->escapeString($row['entidad']);

    return $row_;
  }
  public function _json(array $row = NULL){
    if(empty($row)) return null;
    $prefix = $this->prf();
    $row_ = [];
    $row_["id"] = (is_null($row[$prefix . "id"])) ? null : (string)$row[$prefix . "id"]; //la pk se trata como string debido a un comportamiento erratico en angular 2 que al tratarlo como integer resta 1 en el valor
    $row_["nombre"] = (is_null($row[$prefix . "nombre"])) ? null : (string)$row[$prefix . "nombre"];
    $row_["alias"] = (is_null($row[$prefix . "alias"])) ? null : (string)$row[$prefix . "alias"];
    $row_["valor_defecto"] = (is_null($row[$prefix . "valor_defecto"])) ? null : (string)$row[$prefix . "valor_defecto"];
    $row_["longitud"] = (is_null($row[$prefix . "longitud"])) ? null : intval($row[$prefix . "longitud"]);
    $row_["longitud_minima"] = (is_null($row[$prefix . "longitud_minima"])) ? null : intval($row[$prefix . "longitud_minima"]);
    $row_["no_nulo"] = (is_null($row[$prefix . "no_nulo"])) ? null : settypebool($row[$prefix . "no_nulo"]);
    $row_["unico"] = (is_null($row[$prefix . "unico"])) ? null : settypebool($row[$prefix . "unico"]);
    $row_["principal"] = (is_null($row[$prefix . "principal"])) ? null : settypebool($row[$prefix . "principal"]);
    $row_["tipo_dato"] = (is_null($row[$prefix . "tipo_dato"])) ? null : (string)$row[$prefix . "tipo_dato"];
    $row_["tipo_campo"] = (is_null($row[$prefix . "tipo_campo"])) ? null : (string)$row[$prefix . "tipo_campo"];
    $row_["subtipo"] = (is_null($row[$prefix . "subtipo"])) ? null : (string)$row[$prefix . "subtipo"];
    $row_["creado"] = (is_null($row[$prefix . "creado"])) ? null : (string)$row[$prefix . "creado"];
    $row_["entidad"] = (is_null($row[$prefix . "entidad"])) ? null : (string)$row[$prefix . "entidad"]; //las fk se transforman a string debido a un comportamiento errantico en angular 2 que al tratarlo como integer resta 1 en el valor
    return $row_;
  }



}
