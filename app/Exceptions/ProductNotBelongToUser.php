<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    public function render() {
        return [
            'errors' => 'You have no permission to edit this Product'
        ];
    }
}
