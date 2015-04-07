<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'mgroup',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_PREFIX'=>'mg_',
	'DB_PORT'=>'3306',
	'DB_CHARST'=>'utf8',


	//Auth权限设置
    'AUTH_CONFIG' => array(
        'AUTH_ON' => true,  // 认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP' => 'mg_auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'mg_auth_group_access', // 用户-用户组关系表
        'AUTH_RULE' => 'mg_auth_rule', // 权限规则表
        'AUTH_USER' => 'mg_author', // 用户信息表
    ),

    //超级管理员id,拥有全部权限,只要用户uid在这个角色组里的,就跳出认证.可以设置多个值,如array('1','2','3')
    'ADMINISTRATOR'=>array('1'),
);
