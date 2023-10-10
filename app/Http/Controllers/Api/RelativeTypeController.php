<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewRelativeTypeResourece;
use App\Http\Traits\BaseTrait;
use App\Models\RelativeType;
use Illuminate\Http\Request;

class RelativeTypeController extends Controller
{
    use BaseTrait;

    public function index()
    {
        $types = RelativeType::all();

        $result = ViewRelativeTypeResourece::collection($types);

        $message = $types->count() < 1 ? __("No Relative Types Yet") : "";

        return $this->sendResponse($result, $message);
    }
}
