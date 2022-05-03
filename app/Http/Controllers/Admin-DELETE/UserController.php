<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller {

    public function index() {

        return view( 'users.index', [
            'users' => User::orderBy( 'name' )->paginate(4)->withQueryString(),
        ] );

    }

}

?>