<h3> Dashboard </h3>
<?php 
  try {
    echo "<br/>";
    echo "登录最大重试次数：".Yii::app()->settings->main->login_retry_max; 
    echo "<br/>";

    Yii::app()->settings->main->non_exist; 
  } catch(CHttpException $e) {
    echo "Testing Load error sucess. Error message:".$e->getMessage();
  }
  echo "<br/>";
  $currentUser=User::model()->findByAttributes(array('username'=>Yii::app()->user->getName()));
  if($currentUser) {
    echo "最后登录时间：".$currentUser->last_logon;
    echo "<br/>";
    echo "最后登录IP：".$currentUser->last_ip_address;
  }
  echo "<br/>";
?>

