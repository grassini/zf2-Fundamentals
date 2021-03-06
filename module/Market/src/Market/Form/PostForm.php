<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 10/03/15
 * Time: 17:59
 */

namespace Market\Form;


use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class PostForm extends Form
{
    private $categories;



    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm() //Reponsavel por criar o Formulario
    {
        $this->setAttribute("method", "POST");

        $category = new Select('category');
        $category->setLabel("Category")
                 ->setValueOptions(
                     array_combine(
                         $this->categories,
                         $this->categories
                     )
                 )
        ;

        $title = new Text('title');
        $title->setLabel("Title")
              ->setAttributes(array(
                  'size' => 25,
                  'maxLength' => 128
              ))
        ;

        $submit = new Submit('submit');
        $submit->setAttribute('value', 'Post');

        $this->add($category)
             ->add($title)
             ->add($submit)
        ;

    }

}