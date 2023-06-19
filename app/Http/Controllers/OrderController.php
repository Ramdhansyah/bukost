<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Notifications\OrderNotifications;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi form jika diperlukan
   $data =  $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'nohp' => 'required',
        'kos_id' => 'required',
    ]);

    $order =  Order::create($data);
    $admin = User::where('role', 'admin')->get();
    Notification::send($admin, new OrderNotifications($order));
    return back()->with('success', 'Order berhasil dibuat');

    }
}
