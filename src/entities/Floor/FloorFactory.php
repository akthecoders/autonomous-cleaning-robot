<?php
namespace App\entities\Floor;

use App\entities\Floor\Interfaces\Floor;

class FloorFactory
{
    public static function build(String $type=''): Floor
    {
        if ($type == '') {
            throw new Exception('Invalid Floor Type');
        } else {
            $className = 'App\entities\Floor\\'  . ucfirst($type) . 'Floor';
            if (class_exists($className)) {
                return new $className();
            } else {
                throw new InvalidArgument();
            }
        }
    }
}
