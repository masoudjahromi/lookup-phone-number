<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:26 AM
 */

namespace App\LookupProvider\BirdPower;

use App\LookupProvider\LookupAdapterInterface;

/**
 * Class BirdPowerLookupAdapter
 *
 * @package App\LookupProvider\BirdPower
 */
class BirdPowerLookupAdapter implements LookupAdapterInterface
{
    /**
     * @var BirdPower
     */
    private $birdPower;

    /**
     * BirdPowerLookupAdapter constructor.
     *
     * @param BirdPower $birdPower
     */
    public function __construct(BirdPower $birdPower)
    {
        $this->birdPower = $birdPower;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws \App\Exceptions\BirdPowerProviderException
     */
    public function lookup(string $phoneNumber): bool
    {
        return $this->birdPower->validateNumber($phoneNumber);
    }
}
