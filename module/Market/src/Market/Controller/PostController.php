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
    private $postForm;

    public function setPostForm($postForm)
    {
        $this->postForm = $postForm;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function indexAction()
    {
        $data = $this->params()->fromPost();
        $this->postForm->setData($data);


        $viewModel = new ViewModel(array('postForm'=>$this->postForm, 'data'=>$data));
        //$viewModel->setTemplate("market/post/invalid.phtml");

        return $viewModel;

//        return new ViewModel(array('categories' => $this->categories));
    }
}