<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __invoke()
    {
        $classes = Kelas::active()->get();
        return view('welcome', compact('classes'));
    }
}
