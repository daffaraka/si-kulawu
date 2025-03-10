<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallBackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;


        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Transaksi::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);
            }

            if ($callback->isExpire()) {
                Transaksi::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }

            if ($callback->isCancelled()) {
                Transaksi::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
