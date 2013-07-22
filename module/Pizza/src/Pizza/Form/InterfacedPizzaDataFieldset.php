<?php
/**
 * ZF2 Buch Kapitel 12
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Form;

use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Interfaced Pizza data fieldset
 * 
 * Extends the pizza data fieldset to use interface for input filter
 * 
 * @package    Pizza
 */
class InterfacedPizzaDataFieldset extends PizzaDataFieldset 
    implements InputFilterProviderInterface
{
    public function getInputFilterSpecification()
    {
        return array(
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
    }
}
