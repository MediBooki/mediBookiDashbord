<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Mail\ResetPasswordMail;
use App\Models\Patient;
use App\Traits\ResponseAPI;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use DB; 
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use ResponseAPI;

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:patients',
        ]);

        $token = Str::random(64);

        $result = DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::to($request->email)->send(new ResetPasswordMail($result));

        // Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        return response()->json([
            'reset_token' => $token,
            'success' => true,
            'message' => 'We have e-mailed your password reset link!',
        ],200);
    }
    public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:patients',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
            return response()->json([
                'success' => false,
                'message' => 'Invalid token!',
            ],200);
            //   return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $patient = Patient::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        // return redirect('/login')->with('message', 'Your password has been changed!');
        return response()->json([
            'success' => true,
            'message' => 'Your password has been changed!',
        ],200);
    }
}
