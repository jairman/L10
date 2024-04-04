<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;

class TestController extends BaseController
{
    public function index(Request $request)
    {
        $result = $request->str;
        $msn = $request->message;

        return $this->sendResponse($result, $msn);
    }
}
