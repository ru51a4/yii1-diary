<?php

class m230527_105553_create_diaries_table extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE diaries (
			`id` int(11) NOT NULL auto_increment,
			`name` TEXT default NULL,
			`description` TEXT default NULL,
			`user_id` int(11) default NULL,
			PRIMARY KEY  (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
	}

	public function down()
	{
		$this->dropTable('diaries');
		return true;
	}
}