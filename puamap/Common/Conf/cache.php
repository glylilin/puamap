<?php
//该文件的相关配置，可以去核心代码Think的Cache下的Driver的缓存方式中找
return array(
		'DATA_CACHE_ON' => true,//缓存开启
		'DATA_CACHE_TIME' =>'3600',//设置缓存时间
		'DATA_CACHE_COMPRESS'   =>  true,   // 数据缓存是否压缩缓存
		'DATA_CACHE_CHECK'      =>  true,   // 数据缓存是否校验缓存
		'DATA_CACHE_PREFIX'     =>  'puamap_',     // 缓存前缀
		'DATA_CACHE_TYPE'       =>  'File',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
		'DATA_CACHE_PATH'       =>  TEMP_PATH,// 缓存路径设置 (仅对File方式缓存有效)
		'DATA_CACHE_KEY'        =>  '',	// 缓存文件KEY (仅对File方式缓存有效)
		'DATA_CACHE_SUBDIR'     =>  false,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
		'DATA_PATH_LEVEL'       =>  2,
		//页面静态化配置
		'HTML_CACHE_ON'         =>  false, // 开启静态缓存
		'HTML_CACHE_TIME'       =>  600,   // 全局静态缓存有效期（秒）
		'HTML_FILE_SUFFIX'      =>  '.shtml', // 设置静态缓存文件后缀
		 
		'HTML_CACHE_RULES'      =>  array(
				'*'=>array('{$_SERVER.REQUEST_URI|md5}'),
		),
);