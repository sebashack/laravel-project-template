<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Contact me - Online Store';
        $viewData['subtitle'] = 'Contact me';
        $viewData['email'] = 'fakeemail@gmail.com';
        $viewData['address'] = 'Cr 43a # 45-32';
        $viewData['phone'] = '392 23219231';

        return view('contact.index')->with('viewData', $viewData);
    }
}
