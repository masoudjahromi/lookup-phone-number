<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:45 AM
 */

namespace App\Services\PhoneNumber;

/**
 * Interface CheckPhoneNumberStrategyInterface
 *
 * @package App\Services\PhoneNumber
 */
interface CheckPhoneNumberStrategyInterface
{
    public function validate(string $phoneNumber): bool;
}
