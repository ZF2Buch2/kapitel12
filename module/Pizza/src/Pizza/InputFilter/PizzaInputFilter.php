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
 * namespace definition and usage
 */
namespace Pizza\InputFilter;

use Zend\InputFilter\InputFilter;

/**
 * Pizza input filter
 * 
 * Handles the input filtering for the pizza entity
 * 
 * @package    Pizza
 */
class PizzaInputFilter extends InputFilter
{
    protected $config = array(
        array(
            'name' => 'pizza_name',
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array('max' => 32),
                ),
                array(
                    'name'    => 'Alpha',
                    'options' => array('allowWhiteSpace' => true),
                ),
            ),
            'filters' => array(array('name' => 'StringTrim')),
        ),
        array(
            'name'       => 'pizza_price',
            'validators' => array(array('name' => 'Float')),
            'filters'    => array(array('name' => 'NumberFormat')),
        ),
        array(
            'name' => 'pizza_category',
            'validators' => array(
                array(
                    'name'    => 'InArray',
                    'options' => array('haystack' => array(1, 2, 3)),
                ),
            ),
        )
    );

    /**
     * Add inputs to input filter
     *
     * @return void
     */
    public function __construct()
    {
        foreach ($this->config as $config) {
            $this->add($this->getFactory()->createInput($config));
        }
    }
}
