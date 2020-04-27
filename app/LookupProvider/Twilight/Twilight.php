<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 4:09 AM
 */

namespace App\LookupProvider\Twilight;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\TwilightProviderException;

/**
 * Class Twilight
 *
 * @package App\LookupProvider
 */
class Twilight
{
    const BASE_URL = "url2/look/%s";
    /**
     * @var Client
     */
    private $client;

    /**
     * Twilight constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $phoneNumber
     *
     * @return bool
     *
     * @throws TwilightProviderException
     */
    public function validateNumber(string $phoneNumber): bool
    {
        try {
            $url = sprintf(self::BASE_URL, $phoneNumber);
            $request = $this->client->get($url, [
                'timeout' => 60,
            ]);
            $response = json_decode($request->getBody()->getContents(), true);

            return $response->status;
        } catch (GuzzleException $e) {
            throw new TwilightProviderException();
        }
    }

}
