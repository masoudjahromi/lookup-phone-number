<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 4/27/2020
 * Time: 3:25 AM
 */

namespace App\LookupProvider\HobbiTel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\HobbiTelProviderException;

/**
 * Class HobbiTel
 *
 * @package App\LookupProvider
 */
class HobbiTel
{
    const BASE_URL = "url3";
    /**
     * @var Client
     */
    private $client;

    /**
     * HobbiTel constructor.
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
     * @throws HobbiTelProviderException
     */
    public function validateNumber(string $phoneNumber): bool
    {
        try {
            $url = self::BASE_URL;
            $body = '{number: "%s"}';
            $request = $this->client->post($url, [
                'body'    => sprintf($body, $phoneNumber),
                'timeout' => 60,
            ]);
            $response = json_decode($request->getBody()->getContents(), true);

            return $response->status;
        } catch (GuzzleException $e) {
            throw new HobbiTelProviderException();
        }
    }

}
