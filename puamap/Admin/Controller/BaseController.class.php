<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize(){
		\Think\Hook::add('action_begin','Admin\\Behaviors\\AuthBehavior');
		\Think\Hook::listen('action_begin');
	}
}