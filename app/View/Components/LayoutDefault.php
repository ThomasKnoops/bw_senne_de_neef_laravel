<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class LayoutDefault extends Component {
    public function render() {
        If(Auth::check() && Auth::user()->isAdmin()) {
            return view('layouts.admin');
        }
        return view('layouts.default');
    }
}
