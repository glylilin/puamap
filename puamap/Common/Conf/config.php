<?php
return array (
		// '配置项'=>'配置值'
		'DEFAULT_THEME' =>'default',
		'TMPL_TEMPLATE_SUFFIX'=>'.html',
		'TMPL_LAYOUT_ITEM'=>'{__REPLACE__}',//模板中的 替换内容
		//变量的左右定界符
		'TMPL_L_DELIM'          =>  '<{',            // 模板引擎普通标签开始标记
		'TMPL_R_DELIM'          =>  '}>',
		'URL_ROUTER_ON'   => true, //开启路由,将各自的路由规则写入自己的配置文件中
		
		'URL_CASE_INSENSITIVE' => true, // 不区分大小写
		'MODULE_ALLOW_LIST' => array (
				'Home',
				'Video',
				'Admin'
		),
		'DEFAULT_MODULE' => 'Home',
		'URL_MODULE_MAP' => array (//相当于给模块取一个别名
				'admin' => 'Admin' 
		),
		'LOAD_EXT_CONFIG' => 'db,cache,parse',
		//自定义标签
		'APP_AUTOLOAD_PATH'     =>"@.TagLib",
		//格外标签加载
		//'TAGLIB_PRE_LOAD'       =>"Common\TagLib\Custom",
		'LANG_SWITCH_ON'        =>true,
		'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
		//'LANG_LIST'        => 'zh-cn', // 允许切换的语言列表 用逗号分隔
		//'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
		'DEFAULT_LANG'     => 'zh-cn',
        'TOKEN_ON'=>true,
        'TOKEN_NAME'=>'__hash__',
        'TOKEN_TYPE'=>'md5',
        'TOKEN_RESET'=>true,
		
);