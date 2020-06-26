<?php
namespace App\entities\Apartment;

use App\entities\Apartment\Interfaces\Apartment;

class ApartmentFactory
{
    public static function build(String $type=''): Apartment
    {
        if ($type == '') {
            throw new Exception('Invalid Apartment Type');
        } else {
            $className = 'App\entities\Apartment\\'  . ucfirst($type) . 'Apartment';
            if (class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Apartment type not found.');
            }
        }
    }
}
