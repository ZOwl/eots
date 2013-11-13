<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />

  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/navgoco/jquery.navgoco.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jq.layout/layout-default-latest.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jq.dropdown/jquery.dropdown.css" media="screen" />

  <?php
    $cs=Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    // $cs->registerCoreScript('jquery.ui');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.cookie.min.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/navgoco/jquery.navgoco.min.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/jq.layout/jquery.layout-latest.min.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/jq.jqdock/jquery.jqdock.min.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/jq.dropdown/jquery.dropdown.min.js');
  ?>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".nav").navgoco({
        accordion: true,
        onClickBefore: function(e, submenu) {
          console.log('Clicked on '+ (submenu === false ? 'leaf' : 'branch') + ' `'+$(this).text()+'`');
        },
        onClickAfter: function(e, submenu) {
          e.preventDefault();
          $('.nav').find('li').removeClass('active');
          var li =  $(this).parent();
          var lis = li.parents('li');
          li.addClass('active');
          lis.addClass('active');

          var uri = li.attr('uri');
          if(uri)
            $("#frame").attr("src", "index.php?r=" + uri);
        },
        onToggleBefore: function(submenu, opening) {
          var idx = submenu.attr('data-index');
          var message = opening ? 'opening' : 'closing';
          console.log('I am ' + message + ' menu ' + idx + ' just after this.');
        },
        onToggleAfter: function(submenu, opened) {
          var idx = submenu.attr('data-index');
          var message = opened ? 'opened' : 'closed';
          console.log('I ' + message + ' menu ' + idx + ' just before this.');
        }
      });
      contLayout = $('#container').layout({
          closable: true
        , resizable: true
        , west__size: 180
        , north__size: 84 
        , north__resizable: false
        , north__spacing_open: 0
        , south__resizable: false
        , south__spacing_open: 0
      });
      contLayout.panes.north.layout({
          closable: false
        , west__size: 180
        , west__resizable: false
        , west__spacing_open: 0
        , east__size: 180
        , east__resizable: false
        , east__spacing_open: 0
      });
    });
  </script>
</head>

<body>

<div id="container">
  <div class="header-bg pane ui-layout-north">
    <div class="ui-layout-west">
      <img src='images/logo.png'></img>
    </div>
    <div class="ui-layout-center" align="center" style="padding-top:30px;">
      <ul id='dock-menu' class='jqDockAuto' data-jqdock-align='bottom' data-jqdock-labels='true'>
        <li><a href='#' title='Favourites'><img src='images/uploads.png' alt='' /></a></li>
        <li><a href='#' title='Pictures'><img src='images/uploads.png' alt='' /></a></li>
        <li><a href='#' title='Music'><img src='images/uploads.png' alt='' /></a></li>
        <li><a href='#' title='Videos'><img src='images/uploads.png' alt='' /></a></li>
        <li><a href='#' title='Uploads'><img src='images/uploads.png' alt='' /></a></li>
      </ul>
    </div>
    <div class="ui-layout-east" style="text-align:right;">
      <div id="personal-bar">
        <?php 
          $user = Yii::app()->user;
          if(!$user->isGuest) {
            echo "<span class=\"profile-btn\" data-dropdown=\"#dropdown-profile\">".$user->name."</span>(<a href=\"index.php?r=site/logout\">注销</a>)";
          }
        ?>
        
      </div>
    </div>
  </div>
  <div class="pane ui-layout-west" id="nav-sidebar">
    <ul class="nav">
    <?php 
      $user = Yii::app()->user;
      $auth=Yii::app()->authManager;
      $roles=$auth->getRoles($user->id);
      $menu_items=array();
      foreach($roles as $n=>$role) {
        $items=MenuItem::model()->with('roles')->findAll(array('condition'=>'roles.name="'.$role->getName().'"', 'order'=>'id'));
        $menu_items=array_merge($menu_items, $items);
      }
       
      $level=1;
      foreach($menu_items as $n=>$item)
      {
        if($item->level==$level)
        {
          echo CHtml::closeTag('li')."\n";
        }
        else if($item->level>$level)
        {
          echo CHtml::openTag('ul')."\n";
        }
        else
        {
          echo CHtml::closeTag('li')."\n";

          for($i=$level-$item->level;$i;$i--)
          {
            echo CHtml::closeTag('ul')."\n";
            echo CHtml::closeTag('li')."\n";
          }
        }

        echo CHtml::openTag('li', array('uri'=>$item->uri));
        echo CHtml::openTag('a', array('href'=>'#'));
        echo CHtml::encode($item->title);
        echo CHtml::closeTag('a')."\n";
        $level=$item->level;
      }
       
      for($i=$level;$i;$i--)
      {
        echo CHtml::closeTag('li')."\n";
        echo CHtml::closeTag('ul')."\n";
      }
    ?>
    </ul>
  </div>
  <div class="pane ui-layout-center">
    <div class="container" id="page">
      <iframe id="frame" src="index.php?r=site/dashboard" width="100%" height="100%"></iframe>
    </div>
  </div>
  <div class="pane ui-layout-south">
    <div id="footer">
      Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
    </div><!-- footer -->
  </div>
</div><!-- page -->

<div id="dropdown-profile" class="dropdown dropdown-tip has-icons dropdown-anchor-right">
  <ul class="dropdown-menu">
    <li class="edit"><a href="#">修改个人信息</a></li>
    <li class="passwd"><a href="#">修改密码</a></li>
    <li class="dropdown-divider"></li>
    <li class="reboot"><a href="#">重启系统</a></li>
    <li class="logout"><a href="index.php?r=site/logout">注销</a></li>
  </ul>
</div>

</body>
</html>
