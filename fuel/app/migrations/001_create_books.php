<?php

namespace Fuel\Migrations;

class Create_books
{
	public function up()
	{
		\DBUtil::create_table('books', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'set_dttm' => array('type' => 'datetime'),
			'read_dttm' => array('type' => 'datetime'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'auther' => array('constraint' => 50, 'type' => 'varchar'),
			'contents' => array('type' => 'text'),
			'review' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('books');
	}
}