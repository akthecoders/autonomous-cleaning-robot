<?php

namespace App\helpers;

class helper
{
    public static function initialize(array $argv): array
    {
        $settings = [];
        $options = getopt("", ["floor::", "area::"]);
        $settings['clean'] = false;
        $settings['area'] = (int)$options['area'];
        $settings['floorType'] = $options['floor'];
        return $settings;
    }
    
    public static function resourceValidityCheck(array $settings): array
    {
        if ($settings['clean']) {
            return [
                status => false,
                message => "Nothing to clean!",
            ];
        }
        
        if ($settings['area'] <= 0) {
            return [
                status => false,
                message => "Invalid Area of the Floor",
            ];
        }
        
        if ($settings['floorType'] == '') {
            return [
                status => false,
                message => "Invalid Floor type",
            ];
        }
    
        return [
            status => true,
            message => "Good to Go!"
        ];
    }
}
