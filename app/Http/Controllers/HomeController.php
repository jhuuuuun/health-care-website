<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hospitalName = 'Health Care Website Development';

        $telephone ='090909090909';

        $emergency = 'Emergecy Contact';

        $isOpen = 'True';

        $services = [
                        'Emergency Care',
                        'Cardiology',
                        'Laboratory',
                        'Radiology'
                    ];

        return view('home', compact(
            'hospitalName',
            'telephone',
            'emergency',
            'isOpen',
            'services'
            ));
    }
}
