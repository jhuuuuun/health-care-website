<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $hospitalName = 'Health Care Website Development';

        $telephone = '090909090909';

        $emergency = 'Emergency Contact';

        $isOpen = true;

        $services = Service::with('department')
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact(
            'hospitalName',
            'telephone',
            'emergency',
            'isOpen',
            'services'
        ));
    }
}