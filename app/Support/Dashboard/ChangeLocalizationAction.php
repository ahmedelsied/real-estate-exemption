<?php

namespace App\Support\Dashboard;

class ChangeLocalizationAction
{
    public function __invoke($locale)
    {
        session()->put('locale', $locale);
        session()->put('dashboard-locale', $locale);
        app()->setLocale($locale);
        return redirect()->back();
    }
}
