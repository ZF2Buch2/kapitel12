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
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Another pizza form
 * 
 * Handles the another pizza form
 * 
 * @package    Pizza
 */
class AnotherPizzaForm extends Form
{
    public function __construct()
    {
        parent::__construct('another_pizza');
        
        $nameElement = new Text('pizza_name');
        $nameElement->setLabel('Pizzaname');
        
        $priceElement = new Text('pizza_price');
        $priceElement->setLabel('Preis');
        
        $categoryElement = new Select('pizza_category');
        $categoryElement->setLabel('Kategorie');
        $categoryElement->setValueOptions(array(
            1 => 'Klassiker', 2 => 'Vegetarisch', 3 => 'Extravagant'
        ));
        
        $submitElement = new Submit('save_pizza');
        $submitElement->setValue('Pizza speichern');
        
        $this->add($nameElement);
        $this->add($priceElement);
        $this->add($categoryElement);
        $this->add($submitElement);
    }
}
