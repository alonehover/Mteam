<?php
namespace User\Model;
use Think\Model\RelationModel;
class ApplyProjectModel extends RelationModel{
	protected $_link = array(
		'Project' => array(
		    'mapping_type' => self::BELONGS_TO,
		    'class_name' => 'Project',
		    'foreign_key' => 'pid',
		    'mapping_name' => 'pro',
		    'mapping_fields' => 'name',
   		 ),
		'Group' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'Group',
			'foreign_key' => 'gid',
			'mapping_name' => 'gro',
			'mapping_fields' => 'name',
		),
		'StatusProject'=>array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'StatusProject',
			'foreign_key' => 'status',
			'mapping_name' => 'status',
			'mapping_fields' => 'remark',
		),
	);
}
