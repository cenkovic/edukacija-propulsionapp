<?php
class Zend_View_Helper_User extends Zend_View_Helper_Abstract
{
    public function user()
    {
        $table = new Application_Model_DbTable_Users();
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity())
            $user = $table->getUser($auth->getIdentity()->user_id);
        if(isset($user))
            return $user;
        else
            return false;
    }
}

?>
