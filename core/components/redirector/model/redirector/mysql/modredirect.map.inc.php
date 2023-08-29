<?php
/**
 * @package redirector
 */
$xpdo_meta_map['modRedirect']= array (
  'package' => 'redirector',
  'version' => '1.1',
  'table' => 'redirects',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'pattern' => '',
    'target' => '',
    'context_key' => NULL,
    'triggered' => 0,
    'triggered_first' => NULL,
    'triggered_last' => NULL,
    'active' => 1,
  ),
  'fieldMeta' => 
  array (
    'pattern' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'target' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'context_key' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
      'default' => NULL,
    ),
    'triggered' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'triggered_first' => 
    array (
      'dbtype' => 'timestamp',
      'phptype' => 'datetime',
      'null' => true,
      'default' => NULL,
    ),
    'triggered_last' => 
    array (
      'dbtype' => 'timestamp',
      'phptype' => 'datetime',
      'null' => true,
      'default' => NULL,
    ),
    'active' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'attributes' => 'unsigned',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 1,
    ),
  ),
  'indexes' => 
  array (
    'pattern' => 
    array (
      'alias' => 'pattern',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'pattern' => 
        array (
          'length' => '191',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'target' => 
    array (
      'alias' => 'target',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'target' => 
        array (
          'length' => '191',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'context_key' => 
    array (
      'alias' => 'context_key',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'context_key' => 
        array (
          'length' => '191',
          'collation' => 'A',
          'null' => true,
        ),
      ),
    ),
    'active' => 
    array (
      'alias' => 'active',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'active' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'aggregates' => 
  array (
    'PatternResource' => 
    array (
      'class' => 'modResource',
      'local' => 'pattern',
      'foreign' => 'uri',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'TargetResource' => 
    array (
      'class' => 'modResource',
      'local' => 'target',
      'foreign' => 'uri',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Context' => 
    array (
      'class' => 'modContext',
      'local' => 'context_key',
      'foreign' => 'key',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
