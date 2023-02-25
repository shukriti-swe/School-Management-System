<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Trainer;
use Illuminate\Support\Facades\Session;

class CertificateController extends Controller
{
    public function trainerCertificate(){

        $videoWatch = Content::where(['trainer_id' => Session::get('trainer_id'), 'video_status' => 1])->get();
        $trainer = Trainer::where('id', Session::get('trainer_id'))->get()->first();

        // dd($trainer);
        // dd($videoWatch);

        return view('trainer.certificate.certificate', [
            'videoWatch' => $videoWatch,
            'trainer' => $trainer,
        ]);
    }

    // public function singleNotification(Request $request){
    //     $notification = NotificationInfo::where('id', $request->notificationId)->get()->first();
    //     echo json_encode($notification);
    //     return view('trainer.notification.notification', [
    //         'trainerNotifications' => $trainerNotifications
    //     ]);
    // }
}
