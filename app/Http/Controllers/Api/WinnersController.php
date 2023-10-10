<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewWinnersResourece;
use App\Http\Traits\BaseTrait;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnersController extends Controller
{
    use BaseTrait;

    public function index()
    {
        $winners = Winner::latest('status')->get();

        $result = ViewWinnersResourece::collection($winners);

        $message = $winners->count() < 1 ? __("No Winners Yet") : "";

        return $this->sendResponse($result, $message);
    }
}
