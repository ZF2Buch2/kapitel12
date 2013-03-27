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
namespace Pizza\Entity;

use Zend\Form\Annotation;

/**
 * Pizza entity
 * 
 * @package    Pizza
 * 
 * @Annotation\Name("annotation_pizza")
 * @Annotation\Attributes({"class":"form_horizontal"})
 */
class PizzaEntity
{
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true"})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"max":32}})
     * @Annotation\Validator({"name":"Alpha", "options":
     *                                        {"allowWhiteSpace":"true"}})
     * @Annotation\Attributes({"class":"span6"})
     * @Annotation\Options({"label":"Pizzaname:"})
     */
    protected $name;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true"})
     * @Annotation\Filter({"name":"NumberFormat"})
     * @Annotation\Validator({"name":"Float"})
     * @Annotation\Attributes({"class":"span6"})
     * @Annotation\Options({"label":"Preis:"})
     */
    protected $price;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Validator({"name":"InArray", "options":
     *                                          {"haystack":{"1","2","3"}}})
     * @Annotation\Attributes({"class":"span6"})
     * @Annotation\Options({"label":"Kategorie:",
     *                      "value_options":{"1":"Klassiker",
     *                                       "2":"Vegetarisch",
     *                                       "3":"Extravagant"}})
     */
    protected $category;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\AllowEmpty()
     * @Annotation\Attributes({"value":"Pizza speichern"})
     * @Annotation\Attributes({"class":"btn"})
     */
    protected $submit;
    
    /**
     * Set name
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Get name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set price
     * 
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * Get price
     * 
     * @return float $price
     */
    public function getPrice()
    {
        return round($this->price, 2);
    }
    
    /**
     * Set category
     * 
     * @param integer $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    /**
     * Get category
     * 
     * @return integer $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
