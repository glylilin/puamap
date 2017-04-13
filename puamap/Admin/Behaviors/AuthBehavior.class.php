<?php
namespace Admin\Behaviors;
class AuthBehavior extends \Think\Behavior{
	public function run(&$params){
		$admin_auth = I('session.auth',array());
		if(!$admin_auth){
			
			return false;
		}
	}
}