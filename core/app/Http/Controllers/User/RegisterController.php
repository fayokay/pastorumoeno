<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\KreativMailer;
use App\User;
use Auth;
use App\Subscriber;
use Session;
use App\Quote;
use App\Language;
use Config;
use App\BasicSetting as BS;
use App\BasicExtended as BE;
use App\BasicExtra;
use DB;

class RegisterController extends Controller
{

    public function __construct()
    {
        $bs = BS::first();
        $be = BE::first();

        Config::set('captcha.sitekey', $bs->google_recaptcha_site_key);
        Config::set('captcha.secret', $bs->google_recaptcha_secret_key);
    }

    public function registerPage()
    {
        $bex = BasicExtra::first();

        if ($bex->is_user_panel == 0) {
            return back();
        }

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $be = $currentLang->basic_extended;
        $version = $be->theme_version;

        if ($version == 'dark') {
            $version = 'default';
        }

        $data['version'] = $version;

        return view('front.register', $data);

    }

    public function register(Request $request){

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $bs = $currentLang->basic_setting;
        $be = $currentLang->basic_extended;

        $messages = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];

        $rules = [
            'email'   => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed'
        ];

        if ($bs->is_recaptcha == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $request->validate($rules, $messages);

        $user = new User;
        $input = $request->all();
        $input['status'] = 1;
        $input['password'] = bcrypt($request['password']);
        $token = md5(time().$request->name.$request->email);
        $input['verification_link'] = $token;
        $user->fill($input)->save();


        $mailer = new KreativMailer();
        $data = [
            'toMail' => $user->email,
            'toName' => $user->username,
            'customer_username' => $user->username,
            'verification_link' => "<a href='" . url('register/verify/' . $token) . "'>" . url('register/verify/' . $token) . "</a>",
            'website_title' => $bs->website_title,
            'templateType' => 'email_verification',
            'type' => 'emailVerification'
        ];
        $mailer->mailFromAdmin($data);

        return back()->with('sendmail','We need to verify your email address. We have sent an email to  '.$request->email. ' to verify your email address. Please click link in that email to continue.');

    }

    public function registerList(){

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $bs = $currentLang->basic_setting;
        $be = $currentLang->basic_extended;
        $i=0;

        $edidiong = Subscriber::where('syn',0)->limit(100)->get();
        foreach($edidiong as $request){

            // echo $request->email;
            // if($i==1){

                $user = new User;
                $user->username = $request->email;
                $user->email = $request->email;
                $user->status = 1;
                $user->email_verified = 'Yes';
                $user->password = bcrypt('umoeno');
                $token = md5(time().$request->name.$request->email);
                $user->verification_link = $token;
                $user->save();


                $mailer = new KreativMailer();
                $data = [
                    'toMail' => $user->email,
                    'toName' => $user->username,
                    'customer_username' => $user->username,
                    'customer_id' => $user->id,
                    'customer_password' => 'umoeno',
                    'verification_link' => "<a href='" . url('register/verify/' . $token) . "'>" . url('register/verify/' . $token) . "</a>",
                    'website_title' => $bs->website_title,
                    'templateType' => 'email_verification',
                    'type' => 'emailVerification'
                ];
                $mailer->mailFromAdmin($data);




                $token = "RT2n7ycLQWwzkTh4OAsxvy570FrmwbXTxmW7reUrKX7VgAenwbPmQeTVw1bBa4lYh1uLVhG4a0KYWXvdJGluhsnVNVj23uMXFp2m";
                $sender = "Teamumoeno";
                $phone = $request->phone;;
                $msg = "Thank you for joining Teamunoeno support group and welcome! Check your email ".$user->email." for login details";
                $type = "0";
                $routing ="5";
                $sim = "5UCOG1RVS4ZBEMNTXXFK";
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://app.smartsmssolutions.com/io/api/client/v1/sms/',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => array('token' => $token, 'sender' => $sender, 'to' => $phone, 'message' => $msg, 'type' => $type,'routing' => $routing, 'simserver_token' => $sim),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                echo $response;
                DB::table('subscribers')->where('id', $request->id)->update(array('syn'=>1));

            //     exit;
            // }
            // $i++;

            //Please click the link below to verify your email.

            //{verification_link}



        }

        

        //return back()->with('sendmail','We need to verify your email address. We have sent an email to  '.$request->email. ' to verify your email address. Please click link in that email to continue.');

    }


    public function token($token)
    {
        $user = User::where('verification_link',$token)->first();
        $quote = Quote::where('email',$user->email)->first();
        if(isset($user))
        {
            $user->email_verified = 'Yes';
            $quote->verified = 'Yes';
            $quote->update();
            $user->update();
            Auth::guard('web')->login($user);
            Session::flash('success', 'Email Verified Successfully');
            return redirect()->route('user-dashboard');
        }
    }

}
