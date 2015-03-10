<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 01/03/15
 * Time: 17:31
 */

namespace Market\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    public $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function indexAction()
    {
        $viewModel = new ViewModel(array('categories' => $this->categories));
        $viewModel->setTemplate("market/post/invalid.phtml");

        return $viewModel;

//        return new ViewModel(array('categories' => $this->categories));
    }
}