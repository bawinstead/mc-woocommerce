<?php

/**
 * Created by Vextras.
 *
 * Name: Ryan Hungate
 * Email: ryan@mailchimp.com
 * Date: 3/8/16
 * Time: 3:13 PM
 */
class MailChimp_WooCommerce_Store
{
    protected $id = null;
    protected $list_id = null;
    protected $name = null;
    protected $domain = null;
    protected $email_address = null;
    protected $currency_code = null;
    protected $money_format = null;
    protected $primary_locale = null;
    protected $timezone = null;
    protected $phone = null;
    protected $address = null;
    protected $platform = null;

    /**
     * @return array
     */
    public function getValidation()
    {
        return array(
            'id' => 'required|string',
            'list_id' => 'required|string',
            'name' => 'required|string',
            'domain' => 'string',
            'email_address' => 'email',
            'currency_code' => 'required|currency_code',
            'primary_locale' => 'locale_basic',
            'timezone' => 'timezone',
            'phone' => 'string',
        );
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     * @return MailChimp_WooCommerce_Store
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null
     */
    public function getListId()
    {
        return $this->list_id;
    }

    /**
     * @param null $list_id
     * @return MailChimp_WooCommerce_Store
     */
    public function setListId($list_id)
    {
        $this->list_id = $list_id;

        return $this;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     * @return MailChimp_WooCommerce_Store;
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param null $domain
     * @return MailChimp_WooCommerce_Store;
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return null
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param null $email_address
     * @return MailChimp_WooCommerce_Store;
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;

        return $this;
    }

    /**
     * @return null
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * @param null $currency_code
     * @return MailChimp_WooCommerce_Store;
     */
    public function setCurrencyCode($currency_code)
    {
        $this->currency_code = $currency_code;

        return $this;
    }

    /**
     * @return null
     */
    public function getMoneyFormat()
    {
        return $this->money_format;
    }

    /**
     * @param null $money_format
     * @return MailChimp_WooCommerce_Store;
     */
    public function setMoneyFormat($money_format)
    {
        $this->money_format = $money_format;

        return $this;
    }

    /**
     * @return null
     */
    public function getPrimaryLocale()
    {
        return $this->primary_locale;
    }

    /**
     * @param null $primary_locale
     * @return MailChimp_WooCommerce_Store;
     */
    public function setPrimaryLocale($primary_locale)
    {
        $this->primary_locale = $primary_locale;

        return $this;
    }

    /**
     * @return null
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param null $timezone
     * @return MailChimp_WooCommerce_Store;
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null $phone
     * @return MailChimp_WooCommerce_Store;
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param $platform
     * @return $this
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @return MailChimp_WooCommerce_Address
     */
    public function getAddress()
    {
        if (empty($this->address)) {
            $this->address = new MailChimp_WooCommerce_Address();
        }
        return $this->address;
    }

    /**
     * @param MailChimp_WooCommerce_Address $address
     * @return Store;
     */
    public function setAddress(MailChimp_WooCommerce_Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return mailchimp_array_remove_empty(array(
            'id' => $this->getId(),
            'platform' => $this->getPlatform(),
            'list_id' => $this->getListId(),
            'name' => $this->getName(),
            'domain' => $this->getDomain(),
            'email_address' => $this->getEmailAddress(),
            'currency_code' => $this->getCurrencyCode(),
            'money_format' => $this->getMoneyFormat(),
            'primary_locale' => $this->getPrimaryLocale(),
            'timezone' => $this->getTimezone(),
            'phone' => $this->getPhone(),
            'address' => $this->getAddress()->toArray(),
        ));
    }

    /**
     * @param array $data
     * @return MailChimp_WooCommerce_Store
     */
    public function fromArray(array $data)
    {
        $singles = array(
            'id', 'list_id', 'name', 'domain',
            'email_address', 'currency_code', 'money_format',
            'primary_locale', 'timezone', 'phone', 'platform',
        );

        foreach ($singles as $key) {
            if (array_key_exists($key, $data)) {
                $this->$key = $data[$key];
            }
        }

        if (array_key_exists('address', $data)) {
            $this->address = (new MailChimp_WooCommerce_Address())->fromArray($data['address']);
        }

        return $this;
    }
}
