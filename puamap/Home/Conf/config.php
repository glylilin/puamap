<?php
return array(
	//'配置项'=>'配置值'
	//使用正则的路由配置方式
	'URL_ROUTE_RULES'=>array(
				//'entry/:id\d+' => '/vcourse/index/entry/id/:1', //301跳转
				'/entry\/(\d+)(\/(\d+))?/' => 'vcourse/index/entry?type=:1&id=:3',
				'/view\/(\d+)(\/(\d+))?/' => 'vcourse/index/view?cid=:1&vid=:3',
		
		),
);