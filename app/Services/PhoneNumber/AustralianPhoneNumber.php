<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 4:58 AM
 */

namespace App\Services\PhoneNumber;

use App\Exceptions\HobbiTelProviderException;
use App\Exceptions\TwilightProviderException;
use App\Exceptions\BirdPowerProviderException;
use App\LookupProvider\HobbiTel\HobbiTelLookupAdapter;
use App\LookupProvider\Twilight\TwilightLookupAdapter;
use App\LookupProvider\BirdPower\BirdPowerLookupAdapter;

/**
 * Class AustralianPhoneNumber
 *
 * @package App\Services\PhoneNumber
 */
class   AustralianPhoneNumber implements CheckPhoneNumberStrategyInterface
{
    /**
     * @var BirdPowerLookupAdapter
     */
    private $birdPowerLookupAdapter;
    /**
     * @var TwilightLookupAdapter
     */
    private $twilightLookupAdapter;
    /**
     * @var HobbiTelLookupAdapter
     */
    private $hobbiTelLookupAdapter;

    /**
     * AustralianPhoneNumber constructor.
     *
     * @param BirdPowerLookupAdapter $birdPowerLookupAdapter
     * @param TwilightLookupAdapter  $twilightLookupAdapter
     * @param HobbiTelLookupAdapter  $hobbiTelLookupAdapter
     */
    public function __construct(
        BirdPowerLookupAdapter $birdPowerLookupAdapter,
        TwilightLookupAdapter $twilightLookupAdapter,
        HobbiTelLookupAdapter $hobbiTelLookupAdapter
    )
    {
        $this->birdPowerLookupAdapter = $birdPowerLookupAdapter;
        $this->twilightLookupAdapter = $twilightLookupAdapter;
        $this->hobbiTelLookupAdapter = $hobbiTelLookupAdapter;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     *
     */
    public function validate(string $phoneNumber): bool
    {
        try {
            return $this->birdPowerLookupAdapter->lookup($phoneNumber);
        } catch (BirdPowerProviderException $birdPowerProviderException) {
            try {
                return $this->twilightLookupAdapter->lookup($phoneNumber);
            } catch (TwilightProviderException $twilightProviderException) {
                try {
                    return $this->hobbiTelLookupAdapter->lookup($phoneNumber);
                } catch (HobbiTelProviderException $hobbiTelProviderException) {
                    return false;
                }
            }
        }
    }
}
