<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Strategy;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $strategies = Strategy::all();
        return view('content.run_metric', compact('categories', 'strategies'));
    }
}
?>