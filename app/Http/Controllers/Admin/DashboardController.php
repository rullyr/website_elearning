<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $type_menu = 'dashboard';
        $class = Kelas::get()->count();
        $materials = Material::get()->count();
        $quis = Quiz::get()->count();
        $user = User::get()->count();
        return view(
            'admin.pages.dashboard',
            compact('type_menu', 'class', 'materials', 'quis', 'user')
        );
    }
}
