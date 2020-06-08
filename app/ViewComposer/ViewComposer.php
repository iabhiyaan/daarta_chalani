<?php
namespace App\ViewComposer;

// use App\Models\Destinationtype;
// use App\Models\Group;
use Illuminate\View\View;

class ViewComposer
{
    private $dashboard;

    public function __construct()
    {

    }
    public function compose(View $view)
    {
        // $destination_types = Destinationtype::orderBy('created_at', 'desc')->take(2)->get();
        // $groups = Group::orderBy('created_at', 'asc')->take(2)->get();
        // $view->with(['dashboard_destination_types' => $destination_types, 'dashboard_groups' => $groups]);
    }

}
