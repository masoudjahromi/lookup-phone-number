<?php

namespace App\Http\Controllers;

use App\Services\Lookup\LookupService;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    /**
     * @var LookupService
     */
    private $lookup;

    public function __construct(LookupService $lookup)
    {
        $this->lookup = $lookup;
    }

    public function lookup($phoneNumber)
    {
        return ["valid" => $this->lookup->checkNumber($phoneNumber)];
    }
}
