<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:25 AM
 */

namespace App\LookupProvider\BirdPower;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\BirdPowerProviderException;

/**
 * Class BirdPower
 *
 * @package App\LookupProvider
 */
class BirdPower
{
    const BASE_URL = "url1/look";
    /**
     * @var Client
     */
    private $client;

    /**
     * BirdPower constructor.
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
     * @throws BirdPowerProviderException
     */
    public function validateNumber(string $phoneNumber): bool
    {
        try {
            $url = self::BASE_URL;
            $request = $this->client->get($url, [
                'form_params' => [
                    'number' => $phoneNumber
                ],
                'timeout' => 60,
            ]);
            $response = json_decode($request->getBody()->getContents(), true);

            return $response->status;
        } catch (GuzzleException $e) {
            throw new BirdPowerProviderException();
        }
    }

}
