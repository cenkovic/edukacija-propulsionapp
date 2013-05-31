<?php
class Application_Form_Guestbook extends Zend_Form
{
    public function init()
    {
         $this->addElementPrefixPath(
                'My',
                APPLICATION_PATH.'/forms/validate/',
                'validate'
        );
         $this->addElementPrefixPath(
                'My',
                APPLICATION_PATH.'/forms/filter/',
                'filter'
        );



        // Podešavanje metode za submitovanje forme, u ovom slučaju metod POST
        $this->setMethod('post');

        // Tekstualno polje
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            
            'validators' => array(
                'EmailAddress'
               
            )
        ));

        $this->getElement('email')->addValidator('UniqueEmail',false, array(new Application_Model_DbTable_Users()));
       
        $d = new My_Form_Element_Date('birthday');
        $d->setLabel('Date of Birth: ')
        ->setView(new Zend_View());
        $d->setValue(array('year' => '2009', 'month' => '04', 'day' => '20'));

        $this->addElement($d);
       

        // Textarea polje
        $this->addElement('textarea', 'comment', array(
            'label'      => 'Please Comment:',
            'required'   => true,
            'rows' => 3,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
        
         $this->getElement('comment')->addFilter('FirstThree',false, array());

         



        // Submit dugme
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Guestbook',
        ));

    }
}

?>
