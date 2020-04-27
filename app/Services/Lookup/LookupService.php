<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:43 AM
 */

namespace App\Services\Lookup;

use App\Constants\CountryPrefixNumber;
use App\Services\PhoneNumber\AustralianPhoneNumber;
use App\Services\PhoneNumber\DutchPhoneNumber;
use App\Services\PhoneNumber\OtherwisePhoneNumber;
use App\Utils\Utils;

/**
 * Class LookupService
 *
 * @package App\Services
 */
class LookupService
{
    /**
     * @var DutchPhoneNumber
     */
    private $dutchPhoneNumber;
    /**
     * @var AustralianPhoneNumber
     */
    private $australianPhoneNumber;
    /**
     * @var OtherwisePhoneNumber
     */
    private $otherwisePhoneNumber;

    /**
     * LookupService constructor.
     *
     * @param DutchPhoneNumber      $dutchPhoneNumber
     * @param AustralianPhoneNumber $australianPhoneNumber
     * @param OtherwisePhoneNumber  $otherwisePhoneNumber
     */
    public function __construct(DutchPhoneNumber $dutchPhoneNumber,
                                AustralianPhoneNumber $australianPhoneNumber,
                                OtherwisePhoneNumber $otherwisePhoneNumber
    )
    {
        $this->dutchPhoneNumber = $dutchPhoneNumber;
        $this->australianPhoneNumber = $australianPhoneNumber;
        $this->otherwisePhoneNumber = $otherwisePhoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     */
    public function checkNumber(string $phoneNumber)
    {
        $prefixNumber = Utils::extractFirstCharsFromString($phoneNumber, 2);
        if ($prefixNumber == CountryPrefixNumber::DUTCH) {
            return $this->dutchPhoneNumber->validate($phoneNumber);
        } elseif ($prefixNumber == CountryPrefixNumber::AUSTRALIAN) {
            return $this->australianPhoneNumber->validate($phoneNumber);
        } else {
            return $this->otherwisePhoneNumber->validate($phoneNumber);
        }
    }
}
