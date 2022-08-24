<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderShipped;

class UserController extends Controller
{
    public function __construct()
    {
        
    }
    public function show(Request $request)
    {

        Auth::loginUsingId(1, true);

        Auth::logout();
        $user = 1;
        $user_info = $request->user()?->toArray();
        // $order = Order::findOrFail($user);
        var_dump($request->user()?->id ?: $request->ip());
        echo PHP_EOL;
        $url = route('profile', ['user' => $user]);
        echo $url . PHP_EOL;
        echo PHP_EOL;
        var_dump(event(new OrderShipped(User::findOrFail($user))));
        echo PHP_EOL;
        var_dump($request->all());
        echo PHP_EOL;
        var_dump($request->input());
        var_dump($request->query());
        var_dump($request->post());
        if ($request->has('name')) {
            echo "ok";
        }
        // $request->flash();
        var_dump($request->old('id'));
        view()->share('key','111');

        return view('user.profile', ['user' => $user]);
    }
}
