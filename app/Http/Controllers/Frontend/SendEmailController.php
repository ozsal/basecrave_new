<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class SendEmailController extends Controller
{
    public function reservation(Request $request){
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email'
                ]);

        Mail::send('email', [
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phonenumber' => $request->post('phonenumber'),
                'numberofpeople' => $request->post('numberofpeople'),
                'date' => $request->post('date') ],
                function ($message) {
                        $message->from('basecravefood@gmail.com');
                        $message->to('basecravefood@gmail.com', 'Basecrave')
                        ->subject('Reservation');
        });

        return back()->with('success', 'Thanks for contacting us, We will get back to you soon!');

    }
}
