<?php
class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_primary = 'user_id';

    public function add($values){
        $row = $this->createRow();
        $row->setFromArray($values);
      
        $row->birthday = date('Y-m-d', strtotime($values['birthday']['year'].'-'.$values['birthday']['month'].'-'.$values['birthday']['day'] ));
        $row->save();
        return $row;
    }

    public function checkExist($value)
    {
        $select = $this->select()->where('UPPER(email) = UPPER(?)', $value);
        return $this->fetchRow($select);
    }
}

