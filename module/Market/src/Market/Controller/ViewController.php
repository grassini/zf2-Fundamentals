<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 01/03/15
 * Time: 17:18
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    public function indexAction()
    {
        $category = $this->params()->fromRoute("category");

        return new ViewModel(array('category'=>$category));
    }

    public function itemAction()
    {
        $itemId = $this->params()->fromRoute('itemId');

        if(!$itemId){
            $this->flashMessenger()->addMessage("Item not Found");

            return $this->redirect()->toRoute('market');
        }

        return new ViewModel(array('itemId'=>$itemId));
    }

}