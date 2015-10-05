<?php

class Sandfox_GeoIP_Model_Country extends Sandfox_GeoIP_Model_Abstract
{
    private $country;
    private $allowed_countries = array();

    public function __construct()
    {
        parent::__construct();

        $this->country = $this->getCountryByIp(Mage::helper('core/http')->getRemoteAddr());
        $allowCountries = explode(',', (string)Mage::getStoreConfig('general/country/allow'));
        $this->defaultCountry = (string)Mage::getStoreConfig('general/country/default');
        $this->addAllowedCountry($allowCountries);
    }

    public function getCountryByIp($ip)
    {
        /** @var $wrapper Sandfox_GeoIP_Model_Wrapper */
        $wrapper = Mage::getSingleton('geoip/wrapper');
        if ($wrapper->geoip_open($this->local_file, 0)) {
            $country = $wrapper->geoip_country_code_by_addr($ip);
            $wrapper->geoip_close();

            return $country;
        } else {
            return null;
        }
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function isCountryAllowed($country = '')
    {
        $country = $country ? $country : $this->country;
        if (count($this->allowed_countries) && $country) {
            return in_array($country, $this->allowed_countries);
        } else {
            return true;
        }
    }

    public function isDefaultCountry($country = '')
    {
        $country = $country ? $country : $this->country;
        if (!empty($this->defaultCountry) && $country) {
            return ($this->defaultCountry == $country);
        } else {
            return false;
        }
    }

    public function addAllowedCountry($countries)
    {
        $countries = is_array($countries) ? $countries : array($countries);
        $this->allowed_countries = array_merge($this->allowed_countries, $countries);

        return $this;
    }
}
