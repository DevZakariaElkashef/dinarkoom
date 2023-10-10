<?php


namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class  ApplicationComposer
{
    public function compose(View $view): void
    {
        $view->with('app', Setting::first());
    }
}