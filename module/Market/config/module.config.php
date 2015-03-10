<?php
return array(
    'router' => array(
        'routes' => array(
            # /home
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action'     => 'index'
                    )
                )
            ),
            # /market
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/market',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action'     => 'index'
                    )
                ),

                //Passando Rotas Filhas, Deixa a toda Dinamica, uma rota dentro de outra
                'may_terminate' => true,
                'child_routes' => array(//Aqui começa a rota filha de /market
                    # /market/view
                    'view' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/view',
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action'     => 'index'
                            )
                        ),

                        //Rota filha da filha
                        'may_terminate' => true,
                        'child_routes' => array(
                            # /market/view/item
                            'main' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/main[/:category]',
                                    'defaults' => array(
                                        'action' => 'index'
                                    )
                                )
                            ),
                            # /market/view/item
                            'item' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/item[/:itemId]',
                                    'defaults' => array(
                                        'action' => 'item'
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    )
                                )
                            )
                        )
                    ),
                    # /market/post
                    'post' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/post',
                            'defaults' => array(
                                'controller' => 'market-post-controller',
                                'action'     => 'index'
                                )
                            )
                        )
                    )
                )
            )
        ),
        'controllers' => array(
            'invokables' => array(
                'market-index-controller' => 'Market\Controller\IndexController',
                'market-view-controller'  => 'Market\Controller\ViewController'
            ),
            'factories' => array(
                'market-post-controller' => 'Market\Factory\PostControllerFactory',
            ),
            'aliases' => array(
                'alt' => 'market-view-controller'
            )
        ),

        'service_manager' => array(
            'factories' => array(
            'market-post-form'       => 'Market\Factory\PostFormFactory'
            )
        ),

        'view_manager' => array(
            'template_path_stack' => array(
                __DIR__ . '/../view',
            ),
        ),

    );