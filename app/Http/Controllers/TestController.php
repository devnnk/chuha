<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testRank(Request $request)
    {
        $client = new Client();
        $uri = $request->uri ?? abort(500);
        $method = $request->_method ?? 'GET';
        try {
            $request = $client->request($method, $uri);
        } catch (\Exception $exception) {
            abort(404);
        }
        return $request->getBody()->getContents();
    }
}
