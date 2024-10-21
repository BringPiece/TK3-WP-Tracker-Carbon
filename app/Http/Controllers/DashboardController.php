<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from database (sample data for example)
        $data = [
            'users' => 150,
            'sales' => 1200,
            'revenue' => 55000,
            'activeProjects' => 12
        ];

        return view('dashboard.index', compact('data'));
    }
}
