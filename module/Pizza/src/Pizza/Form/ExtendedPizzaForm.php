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

use Zend\Form\Element\Collection;
use Zend\Form\Element\Submit;
use Zend\Form\Fieldset;
use Zend\Form\Form;

/**
 * Extended pizza form
 * 
 * Handles the simple pizza form
 * 
 * @package    Pizza
 */
class ExtendedPizzaForm extends Form
{
    public function __construct(Fieldset $pizzaDataFieldset)
    {
        parent::__construct('extended_pizza');
        
        $toppingsElement = new Collection('pizza_toppings');
        $toppingsElement->setOptions(array(
            'label' => 'Pizzabeläge',
            'count' => 4,
            'target_element' => array(
                'type' => 'Pizza\Form\ToppingsRowFieldset'
            )
        ));
        
        $submitElement = new Submit('save_pizza');
        $submitElement->setValue('Pizza speichern');
        
        $this->add($pizzaDataFieldset);
        $this->add($toppingsElement);
        $this->add($submitElement);
    }
}
