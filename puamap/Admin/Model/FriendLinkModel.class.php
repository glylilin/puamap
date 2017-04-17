<?php
namespace Admin\Model;
use Think\Model;
class  FriendLinkModel extends Model{
  
    public function addLink($data){
        return $this->add($data);
    }
}