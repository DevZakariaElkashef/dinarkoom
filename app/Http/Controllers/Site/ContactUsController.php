<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageReqeust;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('site.contact_us.contact');
    }

    public function store(StoreContactMessageReqeust $request)
    {
        $data = $request->all();

        ContactUs::create($data);

        return back()->with('message', __('Your Message Sent Successfully.'));
    }
}
