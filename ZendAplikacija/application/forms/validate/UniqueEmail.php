<?php
class My_UniqueEmail extends Zend_Validate_Abstract
{
    const EMAIL_EXISTS='';
    protected $_messageTemplates = array(
        self::EMAIL_EXISTS=>'Email "%value%" exists'
    );
    public function __construct(Application_Model_DbTable_Users $model)
    {
        $this->_model = $model;
    }
    public function isValid($value, $context=null)
    {
        $this->_setValue($value);

        $exist = $this->_model->checkExist($value);
        if(isset($exist) && $exist != null)
            $error = true;
        else
            $error = false;
        
        if (!$error)
            return true;

        $this->_error(self::EMAIL_EXISTS);
        return false;
    }
}

?>
