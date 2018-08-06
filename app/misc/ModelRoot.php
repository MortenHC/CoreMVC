<?php

abstract class ModelRoot
{
    public $dataObject;

    // Create the data object that needs to be available in all subclasses
    public function __construct()
    {
        $this->dataObject = new DataObject();
        $this->commonData();
    }

    // Add data that is required for all views
    protected function commonData()
    {
        // Default strings
        $this->dataObject->set('titlePrefix', '');
        $this->dataObject->set('titlePostfix', ' - CoreMVC');
        $this->dataObject->set('copyright', '&#169; 2018 - All rights reserved');

        // Social media links
        $this->dataObject->set('gitHub', 'https://github.com/MortenHC');

        // Misc
        $this->dataObject->set('httpCode', 200); // Default HTTP response - Should stay!
    }
}
