<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // Exercicio: M3Ex1
        // escutar / listens: "dispatch" event
        // context: $this
        // handler or callback or metodo: onDispatch()
        // priority / prioridade: 100
        //Registrando o evento 'onDispatch'
        //Quando disparar o evento 'dispacht' vai chamar 'onDispatch'
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 100);
    }

    //Criando o metodo onDispatch
    public function onDispatch(MvcEvent $e)
    {
        //Pega o ServiceManager
        $sm = $e->getApplication()->getServiceManager();
        //Pega o Service "categories"
        $categories = $sm->get("categories");

        //Pega a ViewModel
        $vm = $e->getViewModel();
        //Coloca o Service na Variable $categories
        $vm->setVariable("categories", $categories);
    }


    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
