<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 01/03/15
 * Time: 10:47
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends \Zend\Mvc\Controller\AbstractActionController
{
    public function indexAction()
    {
        $messages = array();
        if($this->flashMessenger()->hasMessages()){
            $messages = $this->flashMessenger()->getMessages();
        }
        // Aqui será instanciado a ViewModel automaticamente para
        // inserir o conteudo do array
        return array('messages' => $messages);


        //return new ViewModel(array('messages' => $messages));
    }

    public function fooAction()
    {
        return new ViewModel();
    }
}