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
namespace Pizza\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

/**
 * Pizza data input filter
 * 
 * Handles the input filtering for some pizza data
 * 
 * @package    Pizza
 */
class PizzaDataInputFilter extends InputFilter
{
    /**
     * Add inputs to input filter
     *
     * @return void
     */
    public function __construct()
    {
        $name = new Input('pizza_name');
        $name->getFilterChain()->attachByName('StringTrim');
        $name->getValidatorChain()->attachByName('StringLength', array(
            'max' => 32
        ));
        $name->getValidatorChain()->attachByName('Alpha', array(
            'allowWhiteSpace' => true
        ));
        
        $price = new Input('pizza_price');
        $price->getFilterChain()->attachByName('NumberFormat');
        $price->getValidatorChain()->attachByName('Float');
        
        $category = new Input('pizza_category');
        $category->getValidatorChain()->attachByName('InArray', array(
            'haystack' => array(1, 2, 3)
        ));
        
        $this->add($name);
        $this->add($price);
        $this->add($category);
    }
}
