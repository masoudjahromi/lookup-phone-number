<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 4:39 AM
 */

namespace App\LookupProvider\Twilight;


use App\LookupProvider\LookupAdapterInterface;

/**
 * Class TwilightLookupAdapter
 *
 * @package App\LookupProvider\Twilight
 */
class TwilightLookupAdapter implements LookupAdapterInterface
{
    /**
     * @var Twilight
     */
    private $twilight;

    /**
     * TwilightLookupAdapter constructor.
     *
     * @param Twilight $twilight
     */
    public function __construct(Twilight $twilight)
    {
        $this->twilight = $twilight;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws \App\Exceptions\TwilightProviderException
     */
    public function lookup(string $phoneNumber): bool
    {
        return $this->twilight->validateNumber($phoneNumber);
    }
}
