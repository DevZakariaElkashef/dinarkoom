<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewActiveImageResourece;
use App\Http\Resources\ViewAdsResourece;
use App\Http\Traits\BaseTrait;
use App\Models\Auction;
use App\Models\Banner;
use App\Models\Image;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use BaseTrait;

    public function index()
    {
        $ads = Banner::get()->take(2);
        $image = Image::online()->first();
        
        $buyers = Order::where('image_id', $image->id)->count();
        $sales = $buyers * $image->price;

        $auction = Auction::where('month', 10)
        ->whereYear('created_at', Carbon::now()->year)
        ->first();

        $auction = $auction ? $auction->value : 0;

        $resutl = [
            'ads' => ViewAdsResourece::collection($ads),
            'image' => new ViewActiveImageResourece($image),
            'buyers' => (int) $buyers ?? 0,
            'sales' => (int) $auction,
        ];

        return $this->sendResponse($resutl, '');
    }
}
