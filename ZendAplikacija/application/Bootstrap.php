<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
     protected function _initDb()
     {
          $file = APPLICATION_PATH . '/configs/database.php';
         $options = include $file;

        $db = Zend_Db::factory($options['adapter'], $options['params']);
        Zend_Db_Table::setDefaultAdapter($db);
        $db->query("SET NAMES utf8");
        $db->query("SET CHARACTER SET utf8");
        $db->query("SET COLLATION_CONNECTION='utf8_unicode_ci'");
     }

}

