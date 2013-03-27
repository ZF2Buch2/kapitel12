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

use Zend\Form\Element\File;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Pizza\InputFilter\UploadInputFilter;

/**
 * Upload form
 * 
 * Handles the upload form
 * 
 * @package    Pizza
 */
class UploadForm extends Form
{
    public function __construct()
    {
        parent::__construct('upload_form');
        
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        $this->setInputFilter(new UploadInputFilter());
        
        $nameElement = new Text('upload_name');
        $nameElement->setLabel('Name');
        
        $fileElement = new File('upload_file');
        $fileElement->setLabel('Datei');
        
        $submitElement = new Submit('send_upload');
        $submitElement->setValue('Datei hochladen');
        
        $this->add($nameElement);
        $this->add($fileElement);
        $this->add($submitElement);
    }
}
