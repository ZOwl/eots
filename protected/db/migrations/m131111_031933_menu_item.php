<?php

Yii::import('application.models.*');
Yii::import('application.models.base.*');

class m131111_031933_menu_item extends EDbMigration
{
  public function safeUp()
  {
    $this->createTable('menu_item', array(
      'id' => 'pk',
      'root' => 'integer DEFAULT NULL',
      'lft' => 'integer NOT NULL',
      'rgt' => 'integer NOT NULL',
      'level' => 'integer NOT NULL',
      'title' => 'string NOT NULL',
      'uri' => 'string DEFAULT NULL'
    ));

    $root_system_config=new MenuItem;
    $root_system_config->title='系统配置';
    $root_system_config->saveNode();

    $menu_sc_item1=new MenuItem;
    $menu_sc_item1->title='状态';
    $menu_sc_item1->uri='site/dashboard';

    $menu_sc_item2=new MenuItem;
    $menu_sc_item2->title='快捷配置';

    $menu_sc_item2=new MenuItem;
    $menu_sc_item2->uri='op=test';
    $menu_sc_item2->title='配置';

    $menu_sc_item3=new MenuItem;
    $menu_sc_item3->title='管理员设置';
    $menu_sc_item3->uri='account/index';

    $menu_sc_item4=new MenuItem;
    $menu_sc_item4->title='维护';

    $menu_sc_item5=new MenuItem;
    $menu_sc_item5->title='权限管理';
    $menu_sc_item5->uri='role/index';

    $menu_sc_item1->appendTo($root_system_config);
    $menu_sc_item1->saveNode();
    $menu_sc_item2->insertAfter($menu_sc_item1);
    $menu_sc_item2->saveNode();
    $menu_sc_item3->insertAfter($menu_sc_item2);
    $menu_sc_item3->saveNode();
    $menu_sc_item4->insertAfter($menu_sc_item3);
    $menu_sc_item4->saveNode();
    $menu_sc_item5->insertAfter($menu_sc_item4);
    $menu_sc_item5->saveNode();

    $root_network_management=new MenuItem;
    $root_network_management->title='网络管理';
    $root_network_management->saveNode();

    $menu_nm_item1=new MenuItem;
    $menu_nm_item1->title='网络接口';
    $menu_nm_item1->appendTo($root_network_management);
    $menu_nm_item1->saveNode();

    $menu_nm_item2=new MenuItem;
    $menu_nm_item2->title='高可用性';
    $menu_nm_item2->appendTo($root_network_management);
    $menu_nm_item2->saveNode();

    $root_access_rule=new MenuItem;
    $root_access_rule->title='访问控制';
    $root_access_rule->saveNode();

    $menu_ar_item1=new MenuItem;
    $menu_ar_item1->title='策略';
    $menu_ar_item1->appendTo($root_access_rule);
    $menu_ar_item1->saveNode();

    $menu_ar_item2=new MenuItem;
    $menu_ar_item2->title='地址';
    $menu_ar_item2->appendTo($root_access_rule);
    $menu_ar_item2->saveNode();

    $menu_ar_item2=new MenuItem;
    $menu_ar_item2->title='服务';
    $menu_ar_item2->appendTo($root_access_rule);
    $menu_ar_item2->saveNode();

    $menu_ar_item2=new MenuItem;
    $menu_ar_item2->title='时间';
    $menu_ar_item2->appendTo($root_access_rule);
    $menu_ar_item2->saveNode();

    $menu_ar_item2=new MenuItem;
    $menu_ar_item2->title='安全选项';
    $menu_ar_item2->appendTo($root_access_rule);
    $menu_ar_item2->saveNode();

    $root_app_def=new MenuItem;
    $root_app_def->title='应用防护';
    $root_app_def->saveNode();

    $menu_ad_item1=new MenuItem;
    $menu_ad_item1->title='协议控制';
    $menu_ad_item1->appendTo($root_app_def);
    $menu_ad_item1->saveNode();

    $menu_ad_item1_ch1=new MenuItem;
    $menu_ad_item1_ch1->title='协议控制总策略';
    $menu_ad_item1_ch1->appendTo($menu_ad_item1);
    $menu_ad_item1_ch1->saveNode();

    $menu_ad_item2=new MenuItem;
    $menu_ad_item2->title='入侵防护';
    $menu_ad_item2->appendTo($root_app_def);
    $menu_ad_item2->saveNode();

    $menu_ad_item3=new MenuItem;
    $menu_ad_item3->title='Web应用防护';
    $menu_ad_item3->appendTo($root_app_def);
    $menu_ad_item3->saveNode();

    $root_session_management=new MenuItem;
    $root_session_management->title='会话管理';
    $root_session_management->saveNode();

    $menu_sm_item1=new MenuItem;
    $menu_sm_item1->title='会话控制';
    $menu_sm_item1->appendTo($root_session_management);
    $menu_sm_item1->saveNode();

    $menu_sm_item2=new MenuItem;
    $menu_sm_item2->title='会话统计';
    $menu_sm_item2->appendTo($root_session_management);
    $menu_sm_item2->saveNode();

    $menu_sm_item3=new MenuItem;
    $menu_sm_item3->title='会话状态';
    $menu_sm_item3->appendTo($root_session_management);
    $menu_sm_item3->saveNode();

    $root_protocol_pack=new MenuItem;
    $root_protocol_pack->title='协议封装';
    $root_protocol_pack->saveNode();

    $menu_pp_item1=new MenuItem;
    $menu_pp_item1->title='封装策略';
    $menu_pp_item1->appendTo($root_protocol_pack);
    $menu_pp_item1->saveNode();

    $root_unify_auth=new MenuItem;
    $root_unify_auth->title='统一认证';
    $root_unify_auth->saveNode();

    $menu_ua_item1=new MenuItem;
    $menu_ua_item1->title='角色管理';
    $menu_ua_item1->appendTo($root_unify_auth);
    $menu_ua_item1->saveNode();

    $root_monitor=new MenuItem;
    $root_monitor->title='状态监控';
    $root_monitor->saveNode();

    $menu_monitor_item1=new MenuItem;
    $menu_monitor_item1->title='状态信息';
    $menu_monitor_item1->appendTo($root_monitor);
    $menu_monitor_item1->saveNode();

    $root_log=new MenuItem;
    $root_log->title='日志';
    $root_log->saveNode();

    $menu_log_item1=new MenuItem;
    $menu_log_item1->title='日志配置';
    $menu_log_item1->appendTo($root_log);
    $menu_log_item1->saveNode();

    $menu_log_item2=new MenuItem;
    $menu_log_item2->title='日志访问';
    $menu_log_item2->appendTo($root_log);
    $menu_log_item2->saveNode();
  }

  public function safeDown()
  {
    $this->dropTable('menu_item');
  }
}
