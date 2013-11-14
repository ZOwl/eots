<?php
class WebUser extends CWebUser
{
    public function afterLogin() {
        $currentUser= User::model()->findByAttributes(array('username'=>Yii::app()->user->getName()));
        if($currentUser) {
          // $currentUser->last_logon = new CDbExpression('NOW()');
          // $currentUser->last_ip_address = ip2long(CHttpRequest::getUserHostAddress());
          $currentUser->last_logon = date("Y-m-d H:i:s", time());
          $currentUser->last_ip_address = CHttpRequest::getUserHostAddress();
          $currentUser->repeatpassword=$currentUser->password;
          $currentUser->save();
        }
    }
}
?>
