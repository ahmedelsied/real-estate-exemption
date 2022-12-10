<?php

namespace App\Http\Controllers\Dashboard;

use App\Domain\Core\Models\TaxExemption;
use App\Http\Controllers\Dashboard\DashboardController;

class IndexController extends DashboardController
{

    public function index()
    {
        $total = TaxExemption::sum('exclusion_value');
        return view('dashboard.home',compact('total'));
    }
}
