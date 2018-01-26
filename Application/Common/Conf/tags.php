<?php
return array(
	//表单令牌行为绑定
    'view_filter' => array('Behavior\TokenBuildBehavior'),
   // 'app_begin' => array("Getcoding"),
  //  "app_begin" => array("Getcoding"),
   // 'view_filter' => array('Behavior\Getcoding'),
    'app_begin' => array('Behavior\GetcodingBehavior'),

);