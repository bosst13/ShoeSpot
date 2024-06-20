<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    //pag na read na yung admin yung notification mawawala na sa bell
    public function markNotificationAsRead($notificationId)
    {
        $admin = Auth::user();
        $notification = $admin->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        return back();
    }
     //para ma view yung notificatio

    // public function showNotifications()
    // {
    //     $admin = Auth::user();
    //     $notifications = $admin->unreadNotifications;

    //     return view('admin.dashboard', compact('notifications'));
    // }
}
