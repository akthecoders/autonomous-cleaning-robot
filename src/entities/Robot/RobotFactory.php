<?php
namespace App\entities\Robot;

use App\entities\Robot\Interfaces\Bot;

class RobotFactory
{
    public static function build(String $type=''): Bot
    {
        if ($type == '') {
            throw new Exception('Invalid Robot Type');
        } else {
            $className = 'App\entities\Robot\\'  . ucfirst($type) . 'Robot';
            if (class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Robot type not found.');
            }
        }
    }
}
