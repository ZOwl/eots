<?php

class m131113_063507_settings extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('settings', array(
      'name' => 'varchar(20) NOT NULL', 
      'value' => 'varchar(255) NOT NULL'
    ));
    $this->insert('settings', array('name'=>'login_retry_max', 'value'=>'5'));
  }

  public function safeDown()
  {
    $this->dropTable('settings');
  }
}
