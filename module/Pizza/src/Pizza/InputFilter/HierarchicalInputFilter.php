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

/**
 * Hierarchical input filter
 * 
 * Handles the hierarchical input filtering for the pizza entity
 * 
 * @package    Pizza
 */
class HierarchicalInputFilter extends InputFilter
{
    /**
     * Add inputs to input filter
     *
     * @return void
     */
    public function __construct()
    {
        $this->add(new PizzaDataInputFilter(), 'pizza_data');
    }
}
