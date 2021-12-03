<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        $users = Client::all();
        return view("index", compact('users'));

    }

    public function orders(Request $request, $id)
    {

        $client = Client::where('id', $id)->first();
        return view("orders", compact("client"));

    }

}
