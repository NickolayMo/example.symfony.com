<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class ShippingDetails {
    /**
     * @Assert\NotBlank(message = "Укажите имя")
     */
    public $name;
     /**
     * @Assert\NotBlank(message = "Укажите адрес доставки")
     */
    public $address;
    
    /**
     *
     * @Assert\NotBlank(message = "Укажите номер телефона")
     */
    public $phone;
    /**
     * @Assert\NotBlank(message = "Укажите город")
     */
    public $city;
     /**
     * @Assert\NotBlank(message = "Укажите страну")
     */
    public $country;
            
    
}
