<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function update(Request $request, $id)
    {
        $auction = Auction::findOrFail($id);

        if ($request->site_discount) {

            $auction->update([
                'value' => $request->value,
                'site_discount' => 1
            ]);
        } else {
            $auction->update([
                'value' => $request->value,
                'site_discount' => 0
            ]);
        }

        return back()->with('message', __('update successfully'));
    }
}
