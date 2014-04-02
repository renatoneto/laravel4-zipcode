<?php
namespace Skape\Zipcode\Validation;

use Skape\Zipcode\Exception;

class ZipcodeExists
{

    public function validate($attribute, $value, $parameters)
    {
        $finder = \App::make('ZipcodeFinder');

        try {
            $response = $finder->find($value);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

} 