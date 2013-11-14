<?php

Yii::import('application.models.*');
Yii::import('application.models.base.*');

class m131111_121838_users extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('users', array(
      'id' => 'pk',
      'username' => 'varchar(15) NOT NULL', 
      'password' => 'varchar(25) NOT NULL', 
      'email' => 'varchar(128)', 
      'last_logon' => 'varchar(128)', 
      'last_ip_address' => 'varchar(20)'
    ));
    $admin=new User;
    $admin->username="admin";
    $admin->password="admin";
    $admin->repeatpassword="admin";
    $admin->email="admin@test.com";
    $admin->save();
    for($i=0;$i<20;$i++){
      $user=new User;
      $user->username="user".$i;
      $user->password="123456";
      $user->repeatpassword="123456";
      $user->email="user".$i."@test.com";
      $user->save();
    }
  }

  public function safeDown()
  {
    $this->dropTable('users');
  }
}
