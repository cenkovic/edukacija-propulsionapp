<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function bootstrapAction()
    {
        
    }

    public function modelsAction()
    {
        
    }

    public function controllerAction()
    {
        
    }

    public function viewsAction()
    {
        
    }

    public function formsAction()
    {
        
    }

    public function helpersAction()
    {

    }

    public function testAction()
    {
        $this->view->form = $form = new Application_Form_Guestbook();
        $table = new Application_Model_DbTable_Users();
        if($this->_request->isPost())
        {
            if(isset($_POST['submit']))
            {
                $data = $this->_request->getPost();
                if($form->isValid($data))
                {
                    
                    $table->add($data);

                }
            }
        }
    }

}

