<?php

class Model_Book extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'set_dttm',
		'read_dttm',
		'name',
		'auther',
		'contents',
		'review'
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
