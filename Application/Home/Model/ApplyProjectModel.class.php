<?php 
namespace Home\Model;
use Think\Model\RelationModel;
class ApplyProjectModel extends RelationModel{
	protected $_link = array(
		'Project' => array(
		    'mapping_type' => self::BELONGS_TO,
		    'class_name' => 'Project',
		    'foreign_key' => 'pid',
		    'mapping_name' => 'pro',
   		 ),
		'Group' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'Group',
			'foreign_key' => 'gid',
			'mapping_name' => 'gro',
		),
	);
}