<?php

class m230527_105606_create_posts_table extends CDbMigration
{
	public function up()
	{
		$this->execute("CREATE TABLE posts (
			`id` int(11) NOT NULL auto_increment,
			`message` TEXT default NULL,
			`user_id` int(11) default NULL,
			`diary_id` int(11) default NULL,
			PRIMARY KEY  (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
	}

	public function down()
	{
		$this->dropTable('posts');
		return true;
	}
}