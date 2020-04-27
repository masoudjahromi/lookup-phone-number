<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 4:49 AM
 */

namespace App\LookupProvider\HobbiTel;

use App\LookupProvider\LookupAdapterInterface;

/**
 * Class HobbiTelLookupAdapter
 *
 * @package App\LookupProvider\HobbiTel
 */
class HobbiTelLookupAdapter implements LookupAdapterInterface
{
    /**
     * @var HobbiTel
     */
    private $hobbiTel;

    /**
     * HobbiTelLookupAdapter constructor.
     *
     * @param HobbiTel $hobbiTel
     */
    public function __construct(HobbiTel $hobbiTel)
    {
        $this->hobbiTel = $hobbiTel;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws \App\Exceptions\HobbiTelProviderException
     */
    public function lookup(string $phoneNumber): bool
    {
        return $this->hobbiTel->validateNumber($phoneNumber);
    }
}
