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
namespace Pizza\Entity;

use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Pizza hydrator
 * 
 * @package    Pizza
 */
class PizzaHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  PizzaEntity $object
     * @return array
     */
    public function extract($object)
    {
        return array(
            'pizza_name'     => $object->getName(),
            'pizza_price'    => $object->getPrice(),
            'pizza_category' => $object->getCategory(),
        );
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  PizzaEntity $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $object->setName($data['pizza_name']);
        $object->setPrice($data['pizza_price']);
        $object->setCategory($data['pizza_category']);
        
        return $object;
    }
}
