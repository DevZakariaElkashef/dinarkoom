<?php

namespace App\Http\Controllers\Admin;

use App\Exports\WinnerExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWinnerRequest;
use App\Mail\CongratsWinnerMail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $winners = Winner::with('user', 'admin')->latest('month')->latest('status')->paginate(10);
        $users = User::all();
        return view('dashboard.winners.index', compact('winners', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWinnerRequest $request)
    {
        $winner = Winner::create([
            'user_id' => $request->user_id,
            'admin_id' => $request->user()->id,
            'month' => Carbon::now()->month,
            'value' => $request->value
        ]);
        
        foreach(Winner::where('id', '!=', $winner->id)->get() as $win) {
            $win->status = 0;
            $win->save();
        }

        return back()->with('message', __("Winner Added Successfully"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'value' => 'required'
        ]);

        $winner = Winner::findOrFail($id);
        $winner->update($data);

        return back()->with('message', __("Winner Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Winner::findOrFail($id)->delete();

        return back()->with('message', __("Winner Deleted Successfully"));
    }

    public function active($id)
    {
        $winner = Winner::findOrFail($id);

        if ($winner->status) {
            $winner->status = 0;
            
        } else {
            $winner->status = 1;
            
            foreach(Winner::where('id', '!=', $winner->id)->get() as $win) {
                $win->status = 0;
                $win->save();
            }
        }

        $winner->save();

        Notification::create([
            'user_id' => $winner->user_id,
            'title_en' => 'You won with us',
            'title_ar' => 'لقد ربحت معنا',
            'title_ur' => 'آپ ہمارے ساتھ جیت گئے۔',
            'title_fil' => 'Nanalo ka sa amin',
            'body_en' => 'You have won '. $winner->value .' with us this month',
            'body_ar' => 'لقد ربحت معنا  ' . $winner->value .' هذا الشهر',
            'body_fil' => 'Nanalo ka ng '. $winner->value .' sa amin ngayong buwan',
            'body_ur' => 'آپ اس مہینے ہمارے ساتھ '. $winner->value .' جیت چکے ہیں۔',
        ]);

        Mail::to($winner->user->email)->send(new CongratsWinnerMail($winner->value));

        return back()->with('message', __("Winner has been active"));
    }

    public function exportExcel()
    {
        return Excel::download(new WinnerExport, 'winners.xlsx');
    }

    public function exportPdf()
    {
        $winners = Winner::all();

        $pdf = PDF::loadView('dashboard.winners.pdf', compact('winners'));
        $pdf->download('winners.pdf');
    }

    public function search(Request $request)
    {
        $value = $request->value;

        $winners = Winner::whereHas('user', function ($query) use ($value) {
            $query->where('name', 'like', "%$value%");
        })->latest('status')->paginate(10);
                    

        return view('dashboard.winners.table', compact('winners'))->render();

    }
}
