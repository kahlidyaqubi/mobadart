<?php

namespace App\Http\Controllers;


class NotificationController extends Controller
{
   public function get() {
        $notifications = auth()->user()->unreadNotifications()->get()->sortByDesc('created_at');
        return $notifications;
    }
	public function read($id) {
        $notfe=auth()->user()->unreadNotifications()->find($id);
        
            if($notfe)
            $notfe->markAsRead();
        
        return 'success';
    }
	
	}
