<?php
/**
 * ZF2 Buch Kapitel 12
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * Application module configuration
 * 
 * @package    Pizza
 */
return array(
    'router' => array(
        'routes' => array(
            'pizza' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/pizza',
                    'defaults' => array(
                        'controller' => 'pizza',
                        'action'     => 'index',
                    ),
                ),
            ),
            'pizza-name' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pizza/:name',
                    'constraints' => array(
                        'name' => '[a-zA-Z][a-zA-Z-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'pizza',
                        'action'     => 'name',
                    ),
                ),
            ),
            'pizza-toppings' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pizza-toppings[/:page]',
                    'constraints' => array(
                        'name' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'toppings',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
