<h3> Dashboard </h3>
<?php 
  try {
    echo "<br/>";
    echo "登录最大重试次数：".Yii::app()->settings->main->login_retry_max; 
    echo "<br/>";
    echo "登录最大重试次数：".Yii::app()->settings->main->non_exist; 
  } catch(CHttpException $e) {
    echo "Load error:".$e->getMessage();
  }
?>
