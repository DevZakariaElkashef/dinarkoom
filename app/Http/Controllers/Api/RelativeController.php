<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewRelativesResourece;
use App\Http\Traits\BaseTrait;
use App\Models\Relative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RelativeController extends Controller
{
    use BaseTrait;

    public function index(Request $request)
    {
        $user = $request->user();

        $result = ViewRelativesResourece::collection($user->relatives);

        $message = $user->relatives->count() < 1 ? __("You Dont Have Relative Yet") : "";

        return $this->sendResponse($result, $message);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'civil_id' => 'required|unique:relatives,civil_id',
            'type_id' => 'required|exists:relative_types,id'

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $relative = Relative::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'relative_type_id' => $request->type_id,
            'civil_id' => $request->civil_id
        ]);

        return $this->sendResponse(new ViewRelativesResourece($relative), __("Relative Created Successfully"));
    }
}
