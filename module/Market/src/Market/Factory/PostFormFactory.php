<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 01/03/15
 * Time: 17:36
 */

namespace Market\Factory;

use Market\Form\PostForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $categories = $sm->get('categories');

        $form = new PostForm();
        $form->setCategories($categories);
        $form->buildForm();

        return $form;

    }

}