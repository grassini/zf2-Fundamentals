<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 10/03/15
 * Time: 16:35
 */

namespace Application\Helper;


use Zend\Form\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper
{
    public function __invoke($values, $urlPrefix)
    {
        $html = '<ul style="list-style-type: nome;">'. PHP_EOL;
        foreach ($values as $item){
            $html.= sprintf("<li><a href=\"%s/%s\">%s</a></li>\n",
                $urlPrefix, $item, $item);
        }
        $html.="</ul>".PHP_EOL;
        return $html;
    }
}