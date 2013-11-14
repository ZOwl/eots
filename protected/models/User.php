<?php
class User extends CActiveRecord
{
  public $repeatpassword;

  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  public function tableName()
  {
    return "users";
  }

  public function rules()
  {
    return array(
      array('username, password, email', 'required'),
      array('username', 'unique'),
      array('email', 'email'),
      // array('id, username, password, email', 'safe'),
      array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"两次输入密码不一致")
    );
  }
}
?>
