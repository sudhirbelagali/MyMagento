<?php

class Clarion_Contactsgooglemap_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function EnableDisable()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemapyesorno");  
    }
    
    public function getAddress()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemapaddress"); 
    }
    
    public function getmapheight()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemapheight"); 
    }
    
    public function getmapimage()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemapmarkerimg"); 
    }
    public function getmapapi()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemapapikey"); 
    }
    public function getlayout()
    {
       return Mage::getStoreConfig("contactsgooglemap/contactsgooglemap/contactsgooglemappagelayout"); 
    }
    
    public function getdefaultstoreaddress()
    {
       return Mage::getStoreConfig("general/store_information/address"); 
    }
    
}