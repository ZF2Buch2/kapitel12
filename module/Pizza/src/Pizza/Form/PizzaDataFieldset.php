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
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Pizza data fieldset
 * 
 * Handles the pizza data fieldset stuff
 * 
 * @package    Pizza
 */
class PizzaDataFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('pizza_data');
        
        $this->setLabel('Pizzadaten');
        
        $nameElement = new Text('pizza_name');
        $nameElement->setLabel('Pizzaname');
        
        $priceElement = new Text('pizza_price');
        $priceElement->setLabel('Preis');
        
        $categoryElement = new Select('pizza_category');
        $categoryElement->setLabel('Kategorie');
        $categoryElement->setValueOptions(array(
            1 => 'Klassiker', 2 => 'Vegetarisch', 3 => 'Extravagant'
        ));
        
        $this->add($nameElement);
        $this->add($priceElement);
        $this->add($categoryElement);
    }
    
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
