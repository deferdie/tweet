<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use DB;
class ApplicationComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      //$notifacations = DB::table('notifacations')->where('userID', Auth::user()->id)->get();
      $notifacationsCount = DB::table('notifacations')->where('userID', Auth::user()->id)->count();
      //$view->with('notifacations', $notifacations);
      $view->with('notifacationsCount', $notifacationsCount);
    }

}
