<?php 
namespace User\Model;
use Think\Model\RelationModel;
class ApplyGroupModel extends RelationModel{
	protected $_link = array(
		'Group' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'Group',
			'foreign_key' => 'gid',
			'mapping_name' => 'gro',
			'mapping_fields' => 'name',
		),
	);
}