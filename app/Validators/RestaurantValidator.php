<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RestaurantValidator.
 *
 * @package namespace App\Validators;
 */
class RestaurantValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'string|required',
            'email' => 'string|email|unique:users',
            'password' => 'required|between:6,255',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
