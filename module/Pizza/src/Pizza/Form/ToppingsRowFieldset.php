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
namespace Pizza\Form;

use Zend\Form\Element\Select;
use Zend\Form\Fieldset;

/**
 * Toppings row fieldset
 * 
 * Handles the toppings row fieldset
 * 
 * @package    Pizza
 */
class ToppingsRowFieldset extends Fieldset
{
    public function __construct()
    {
        parent::__construct('toppings_row');
        
        $toppingElement = new Select('pizza_topping_id');
        $toppingElement->setLabel('Pizzabelag');
        $toppingElement->setValueOptions(array(
            1 => 'Tomatenpampe',  2 => 'Käse',      3 => 'Salami',
            4 => 'Schinken',      5 => 'Ananas',    6 => 'Champignons',
            7 => 'Melone',        8 => 'Zwiebeln',  9 => 'Thunfisch',
            10 => 'Spinat',      11 => 'Peperoni', 12 => 'Feta',
            13 => 'Hackfleisch', 14 => 'Mais',
        ));

        $portionElement = new Select('pizza_topping_portion');
        $portionElement->setLabel('Portion');
        $portionElement->setValueOptions(array(
            0 => '0', 1 => '1', 2 => '2', 3 => '3',
        ));

        $this->add($toppingElement);
        $this->add($portionElement);
    }
}
