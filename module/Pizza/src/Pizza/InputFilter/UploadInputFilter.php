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
namespace Pizza\InputFilter;

use Zend\InputFilter\FileInput;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

/**
 * Upload input filter
 * 
 * Handles the input filtering for the file upload
 * 
 * @package    Pizza
 */
class UploadInputFilter extends InputFilter
{
    /**
     * Add inputs to input filter
     *
     * @return void
     */
    public function __construct()
    {
        $name = new Input('upload_name');
        $name->getValidatorChain()->attachByName(
            'StringLength', 
            array('max' => 32)
        );
        $name->getFilterChain()->attachByName('StringTrim');
        $name->getFilterChain()->attachByName('Alpha');
        $name->getFilterChain()->attachByName('StringToLower');
        
        $file = new FileInput('upload_file');
        $file->setRequired(true);
        $file->getValidatorChain()->attachByName(
            'fileimagesize',
            array('maxWidth' => 150, 'maxHeight' => 150)
        );
        $file->getValidatorChain()->attachByName(
            'filemimetype',
            array('mimeType' => 'image/jpeg')
        );
        
        $this->add($name);
        $this->add($file);
    }
}
