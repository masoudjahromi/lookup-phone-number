<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:23 AM
 */

namespace App\LookupProvider;

/**
 * Interface LookupAdapterInterface
 *
 * @package App\LookupProvider
 */
interface LookupAdapterInterface
{
    public function lookup(string $phoneNumber): bool;
}
