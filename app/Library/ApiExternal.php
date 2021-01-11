<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/01/21
 * Time: 23:56
 */

namespace App\Library;

use Illuminate\Support\Facades\Http;
class ApiExternal
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getJsonWithOutParameter()
    {
        $response = Http::get($this->url);
        if($response->ok())
            return $response->json();
        else
            [];
    }
}