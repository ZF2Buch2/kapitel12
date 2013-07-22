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

use Zend\Form\Element\Submit;
use Zend\Form\Fieldset;
use Zend\Form\Form;

/**
 * Simple pizza form
 * 
 * Handles the simple pizza form
 * 
 * @package    Pizza
 */
class SimplePizzaForm extends Form
{
    public function __construct(Fieldset $pizzaDataFieldset)
    {
        parent::__construct('simple_pizza');
        
        $submitElement = new Submit('save_pizza');
        $submitElement->setValue('Pizza speichern');
        
        $this->add($pizzaDataFieldset);
        $this->add($submitElement);
    }
}
