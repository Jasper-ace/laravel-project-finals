<?php

use App\Models\Visit;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected date from the request or default to today's date
        $selectedDate = $request->input('date', Carbon::now()->toDateString());
        
        // Fetch visits from the database for the selected date
        $visits = Visit::whereDate('created_at', $selectedDate)->get();
        
        // Return the view with the fetched data and selected date
        return view('index', compact('visits', 'selectedDate'));
    }
}
