<?php

namespace App\ViewComposer;

// use App\Models\Destinationtype;
// use App\Models\Group;

use App\Models\Designation;
use Illuminate\View\View;

class ViewComposer
{
    private $dashboard;

    public function __construct()
    {
    }
    public function compose(View $view)
    {
        $designations = Designation::latest()->where('published', '1')->get();
        $view->with(['designations' => $designations]);
    }
}
