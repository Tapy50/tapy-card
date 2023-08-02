<?php

namespace App\Http\Controllers\User;

use App\Models\Card;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\TappingLog;
use Illuminate\Http\Request;
use App\Models\ProfileElement;
use App\Mail\VerificationEmail;
use JeroenDesloovere\VCard\VCard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GeolocationNotification;

class AuthController extends Controller
{
    public function code($code  , Request $request){

        $card  = Card::where('serial',$code)->where('is_lock',0)->firstOrFail();
        if($card->type == 'employee' && $card->parent_id == null){
            return  abort(404);
        }
        if(isset($card->profile_id) || isset($card->user_id)){
            $data  = Profile::findOrFail($card->profile_id);
            $user  = User::where('id',$card->user_id)->firstOrFail();
            session()->put('lang', $data->lang);

            $log = new TappingLog();
            $log->profile_id=$data->id;
            if($card->id  !=  0  ){
                $log->card_id=$card->id;
            }
            $log->user_id=$data->user_id;
            $log->device=$request->header('User-Agent');
            $log->ip=$request->ip();
            $log->save();
            if($user->type == 'solo'){
                return view('User.Auth.newProfile',compact('data','user'));
            }

            return view('User.Auth.profileView',compact('data','user'));
        }
        $data = $card;

        return view('User.Auth.code',compact('data'));

    }
    public function getLocation(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        try {
            $user = Profile::where('id', $id)->first();
            // Get the geolocation data from the request
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
        
            // Process the geolocation data and send the notification
            // Replace this with your desired notification logic
        
            // For example, you can use Laravel's notification system to send an email
            // with the geolocation data to the website owner:
            Notification::route('mail', 'tapy5050@gmail.com')
                ->notify(new GeolocationNotification($latitude, $longitude));
        
            // Return a response (e.g., a success message)
            return response()->json([
                'message' => 'Geolocation data sent successfully',
                'data' => [$latitude, $longitude]
            ]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['message' => 'Something went wrong']);
        }
    }
    public function Registerview($code,Request $request){

        $data  = Card::where('serial',$code)->where('is_lock',0)->firstOrFail();
        if($data->profile_id == null && $data->user_id == null){
            return view('User.Auth.confirmpassword',compact('data'));

        }else{
            $data  = Profile::findOrFail($data->profile_id);
            $user  = User::where('id',$data->user_id)->firstOrFail();

            $log = new TappingLog();
            $log->profile_id=$data->id;
            if($data->Card->id  !=  0  ){
                $log->card_id=$data->Card->id;
            }
            $log->user_id=$data->user_id;
            $log->device=$request->header('User-Agent');
            $log->ip=$request->ip();
            $log->save();
            if($user->type == 'solo'){
                return redirect("/code/".$code);
                // return view('User.Auth.newProfile',compact('data','user'));
            } else if($user->type == 'employee'){
                return redirect("/code/".$code);
            }
            return view('User.Auth.profileView',compact('data','user'));
        }

    }
    public function ComplateRegister(Request  $request)
    {

        if($data = Card::where('serial',$request->serial)->where('secret',$request->code)->first() ){
            return view('User.Auth.register',compact('data'));

        }else{
            return back()->with('message','password worng');
        }

    }
    public function preview(Request $request){

        $data  = Profile::findOrFail($request->id);
        if($data->Card->is_lock == 1){
            abort(404);
        }
        $user  = User::where('id',$data->user_id)->firstOrFail();

        if($user->type == 'solo'){
            return view('User.Auth.newProfile',compact('data','user'));
        }
        return view('User.Auth.newProfile',compact('data','user'));

    }

    public function profile($code,Request $request){

        $data  = Profile::where('profile_url',$code)->where('is_active','active')->firstOrFail();
        $user  = User::where('id',$data->user_id)->firstOrFail();
        session()->put('lang', $data->lang);
        if($data->Card->is_lock == 1){
            abort(404);
        }
        $log = new TappingLog();
        $log->profile_id=$data->id;
        if($data->Card->id  !=  0  ){
            $log->card_id=$data->Card->id;
        }
        $log->user_id=$data->user_id;
        $log->device=$request->header('User-Agent');
        $log->ip=$request->ip();
        $log->save();
        if($user->type == 'solo'){
            return view('User.Auth.newProfile',compact('data','user'));
        }

        return view('User.Auth.profileView',compact('data','user'));

    }
    public function profile2($code,Request $request){

        $data  = Profile::where('profile_url',$code)->where('is_active','active')->firstOrFail();
        $user  = User::where('id',$data->user_id)->firstOrFail();
        session()->put('lang', $data->lang);
        if($data->Card->is_lock == 1){
            abort(404);
        }
        $log = new TappingLog();
        $log->profile_id=$data->id;
        if($data->Card->id  !=  0  ){
            $log->card_id=$data->Card->id;
        }
        $log->user_id=$data->user_id;
        $log->device=$request->header('User-Agent');
        $log->ip=$request->ip();
        $log->save();

        if($user->type == 'solo'){
            return view('User.Auth.newProfile',compact('data','user'));
        }
        return view('User.Auth.profileView',compact('data','user'));

    }
    public function Employees($category , $profile){
        $data  = Profile::findOrFail($profile);
        $category = Category::findOrFail($category);
        $user  = User::where('id',$data->user_id)->firstOrFail();
        session()->put('lang', $data->lang);
        if($data->Card->is_lock == 1){
            abort(404);
        }
//        $log = new TappingLog();
//        $log->profile_id=$data->id;
//        if($data->Card->id  !=  0  ){
//            $log->card_id=$data->Card->id;
//        }
//        $log->user_id=$data->user_id;
//        $log->device=$request->header('User-Agent');
//        $log->ip=$request->ip();
//        $log->save();


        return view('User.Auth.employees',compact('data','user','category'));
    }
    public function Register(Request $request){

        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'username' => 'required|unique:users',
            'image'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'cover'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'profile_url' => 'required|string|unique:profiles',
//            'ar_first_name' => 'required_if:lang,ar',
//            'en_first_name' => 'required_if:lang,en',
//            'ar_last_name' => 'required_if:lang,ar',
//            'en_last_name' => 'required_if:lang,en',
            'ar_company' => 'required_if:lang,ar',
            'en_company' => 'required_if:lang,en',
//            'ar_title' => 'required_if:lang,ar',
//            'en_title' => 'required_if:lang,en',
//            'ar_sub_title' => 'required_if:lang,ar',
//            'en_sub_title' => 'required_if:lang,en',
//            'ar_about' => 'required_if:lang,ar',
//            'en_about' => 'required_if:lang,en',
        ]);
        try {
            $cart = Card::find($request->card_id);
    
            $data = new User();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->username=$request->username;
            $data->phone=$request->phone;
            $data->type=$request->type;
            $data->is_active='inactive';
            if(isset($cart->company_id)){
                $data->company_id=$cart->company_id;
            }
            $data->password=Hash::make($request->password);
            $data->save();
            if($request->type == 'company'){
                Card::where('parent_id',$cart->id)->update(['company_id'=>$data->id]);
            }
            if($request->profile_url){
                $user = new Profile;
                $user->name=$request->name;
                $user->profile_url=$request->profile_url;
                $user->ar_first_name=$request->ar_first_name;
                $user->en_first_name=$request->en_first_name;
                $user->ar_last_name=$request->ar_last_name;
                $user->en_last_name=$request->en_last_name;
                $user->ar_job_title=$request->ar_job_title;
                $user->en_job_title=$request->en_job_title;
                $user->ar_company=$request->ar_company;
                $user->en_company=$request->en_company;
                $user->ar_job_title=$request->ar_job_title;
                $user->en_job_title=$request->en_job_title;
                $user->ar_company=$request->ar_company;
                $user->en_company=$request->en_company;
                $user->ar_title=$request->ar_title;
                $user->en_title=$request->en_title;
                $user->ar_designation=$request->ar_designation;
                $user->en_designation=$request->en_designation;
                $user->ar_sub_title=$request->ar_sub_title;
                $user->en_sub_title=$request->en_sub_title;
                $user->ar_about=$request->ar_about;
                $user->en_about=$request->en_about;
                $user->image=$request->image;
                $user->cover=$request->cover;
                $user->is_active='active';
                $user->lang=$request->lang;
                $user->user_id=$data->id;
                if(isset($cart->company_id)){
                    $user->company_id=$cart->company_id;
                }
                $user->save();
    
                $cart = Card::find($request->card_id);
                $cart->profile_id=$user->id;
                $cart->user_id=$data->id;
                $cart->save();
    
            }
    
    
    
            $details = $request->email;
    
    
            Mail::to($request->email)->send(new VerificationEmail($details));
    
    
            Auth::guard('web')->login($data);
    
            return redirect('Profile_elements/'.$user->id)->with('message', 'تم العملية بنجاح ');
        } catch (\Exception $e) {
            dd($e);
        }

    }
    public function registerCompany(Request $request){

        $data = $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'username' => 'required|unique:users',
            'image'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'cover'=>'nullable|max:5024|mimes:jpeg,png,jpg',
            'profile_url' => 'required|string|unique:profiles',
            'ar_company' => 'required_if:lang,ar',
            'en_company' => 'required_if:lang,en',
            'ar_title' => 'required_if:lang,ar',
            'en_title' => 'required_if:lang,en',
            'ar_sub_title' => 'required_if:lang,ar',
            'en_sub_title' => 'required_if:lang,en',
            'ar_about' => 'required_if:lang,ar',
            'en_about' => 'required_if:lang,en',
        ]);

        $data = new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->username=$request->username;
        $data->phone=$request->phone;
        $data->type=$request->type;
        $data->is_active='inactive';
        $data->password=Hash::make($request->password);
        $data->save();

        $user = new Profile;
        $user->name=$request->name;
        $user->profile_url=$request->profile_url;
        $user->ar_company=$request->ar_company;
        $user->en_company=$request->en_company;
        $user->ar_title=$request->ar_title;
        $user->en_title=$request->en_title;
        $user->ar_sub_title=$request->ar_sub_title;
        $user->en_sub_title=$request->en_sub_title;
        $user->ar_about=$request->ar_about;
        $user->en_about=$request->en_about;
        $user->image=$request->image;
        $user->cover=$request->cover;
        $user->is_active='active';
        $user->lang=$request->lang;
        $user->user_id=$data->id;
        $user->save();


        $cart = Card::find($request->card_id);
        $cart->profile_id=$user->id;
        $cart->user_id=$data->id;
        $cart->save();


        $details = $request->email;


        Mail::to($request->email)->send(new VerificationEmail($details));


        Auth::guard('web')->login($data);

        return redirect('Profile_elements/'.$user->id)->with('message', 'تم العملية بنجاح ');

    }


    public function testemail($email){
        Mail::to($email)->send(new VerificationEmail($email));

    }
    public function vcf($profile_id)
    {

        $profile = Profile::findOrFail($profile_id);
        $user = User::findOrFail($profile->user_id);

        $vcard = new VCard();

// define variables
        if($profile->lang=='en' ){
            $lastName = $profile->en_last_name;
            $firstName = $profile->en_first_name;
            $additional ='';
            $prefix = '';
            $suffix = '';
            $fullName = true;

        }else{
            $lastName = $profile->ar_last_name;
            $firstName = $profile->e_first_name;
            $additional ='';
            $prefix = '';
            $suffix = '';
            $fullName = true;
        }

        $vcard->addName(
            $lastName,
            $firstName,
            $additional,
            $prefix,
            $suffix,
            $fullName
        );

        $profile_elements = $profile->ElementsContact;

        $vcard->addUrl(url('P',$profile->profile_url));


        foreach($profile_elements as $profile_element) {

            if ($profile_element->sub_type == "website") {
                $vcard->addUrl($profile_element->value);
            }else if ($profile_element->sub_type == "email") {
                $vcard->addEmail($profile_element->value);
            }else if ($profile_element->sub_type == "phone") {
                $vcard->addPhoneNumber($profile_element->value, 'CELL');

            }

        }

        $profile_elements = $profile->ElementsSocial;

        foreach($profile_elements as $profile_element) {


            if ($profile_element->sub_type == "facebook") {
                $element_type = "facebook";
            }else if ($profile_element->sub_type == "instagram") {
                $element_type = "instagram";
            }else if ($profile_element->sub_type == "twitter") {
                $element_type = "twitter";
            }else if ($profile_element->sub_type == "tiktok") {
                $element_type = "tiktok";
            }else if ($profile_element->sub_type == "whatsapp") {
                $element_type = "whatsapp";
            }else if ($profile_element->sub_type == "linkedin") {
                $element_type = "linkedin";
            }else if ($profile_element->sub_type == "pinterest") {
                $element_type = "pinterest";
            }else if ($profile_element->sub_type == "snapchat") {
                $element_type = "snapchat";
            }else if ($profile_element->sub_type == "youtube") {
                $element_type = "youtube";
            }else if ($profile_element->sub_type == "codepen") {
                $element_type = "codepen";
            }else if ($profile_element->sub_type == "github") {
                $element_type = "github";
            }


            $link = $profile_element->value;

            if($profile_element->sub_type == "instagram") $link = "https://www.instagram.com/".$profile_element->value;
            if($profile_element->sub_type == "twitter") $link = "https://www.twitter.com/".$profile_element->value;
            if($profile_element->sub_type == "snapchat") $link = "https://www.snapchat.com/add/".$profile_element->value;
            if($profile_element->sub_type == "tiktok") $link = "https://www.tiktok.com/".$profile_element->value;
            if($profile_element->sub_type == "whatsapp") $link = "http://api.whatsapp.com/send?phone=".$profile_element->value;

            $vcard->addUrl(
                $link,
                $profile_element->sub_type,

            );

        }
        if($profile->lang=='en' ){
            if($profile->en_about){
                $new_str = preg_replace("/&#?[a-z0-9]+;/i",'',$profile->en_about);
                $vcard->addNote(strip_tags($new_str));
            }
            if($profile->en_title){
                $vcard->addJobtitle($profile->en_title);
            }
            if($profile->en_company){
                $vcard->addCompany($profile->en_company);
            }
        }else{
            if($profile->ar_about){
                $new_str = preg_replace("/&#?[a-z0-9]+;/i",'',$profile->ar_about);
                $vcard->addNote(strip_tags($new_str));
            }
            if($profile->ar_title){
                $vcard->addJobtitle($profile->ar_title);
            }
            if($profile->en_company){
                $vcard->addCompany($profile->en_company);
            }

        }

        if($profile->image ) {
            $image =  str_replace("https://tapycard.me/","/",$profile->image);
            $vcard->addPhoto(public_path($image));
        }
// return vcard as a string
//return $vcard->getOutput();
        $file = "contact.vcf";

// return vcard as a download
        return response($vcard->download())
            ->header('Content-Type', 'application/vcf; charset=UTF-8')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Disposition', 'attachment; filename='.basename($file))
            ->header('Expires', '0')
            ->header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'public')
            ->header('Content-Length', filesize($file));



    }

    public function vcf0($profile_id)
    {

        $profile = Profile::findOrFail($profile_id);
        $user = User::findOrFail($profile->user_id);


        if($profile->image ){
            $getPhoto               = file_get_contents($profile->image);
            $b64vcard               = base64_encode($getPhoto);
            $b64mline               = $b64vcard;//chunk_split($b64vcard,74,"\n");
            $b64final               = preg_replace('/(.+)/', ' $1', $b64mline);
            $photo                  = $b64final;
        }
        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        $vCard .= "FN:" . $profile->first_name." ".$profile->last_name . "\r\n";
        $vCard .= "TITLE:" . $profile->en_job_title . "\r\n";

        /*if($usere->email){
            $vCard .= "EMAIL;TYPE=internet,pref:" . $usere->email . "\r\n";
        }*/
        if(isset($getPhoto)){
            $vCard .= "PHOTO;ENCODING=b;TYPE=JPEG:";
            $vCard .= $photo . "\r\n";
        }
        /*
        if($mobile_no){
            $vCard .= "TEL;TYPE=work,voice:" . $mobile_no . "\r\n";
        }*/




        $profile_elements = $profile->ElementsContact;

        $ie = 1;

        $vCard .= "item".$ie.".X-ABLABEL:my Tapycard\r\n";
        $vCard .= "item".$ie.".URL:" . url('P',$profile->profile_url)  . "\r\n";

        foreach($profile_elements as $profile_element) {

            $contact_href = "";
            $element_type = "";

            $profile_element->value = str_replace("\r\n",";", $profile_element->value);
            $profile_element->value = str_replace("\r",";", $profile_element->value);
            $profile_element->value = str_replace("\n",";", $profile_element->value);

            if ($profile_element->sub_type == "website") {$ie++;
                //$vCard .= "URL;TYPE=internet,pref:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".URL:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".X-ABLABEL:Internet\r\n";

            }else if ($profile_element->sub_type == "email") {$ie++;
                //$vCard .= "EMAIL;TYPE=email,pref:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".EMAIL;CHARSET=UTF-8:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".X-ABLABEL:Email\r\n";

            }else if ($profile_element->sub_type == "phone") {$ie++;
                //$vCard .= "TEL;TYPE=work,voice:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".TEL;PREF=1;TYPE=CELL:" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".X-ABLABEL:Phone\r\n";

            }else if ($profile_element->sub_type == "address") {$ie++;
                //$vCard .= "ADR;TYPE=address,pref:" . $profile_element->value . "\r\n";
                $profile_element->value = str_replace(",",";", $profile_element->value);
                $vCard .= "item".$ie.".ADR;CHARSET=UTF-8:;;" . $profile_element->value . "\r\n";
                $vCard .= "item".$ie.".X-ABLABEL:Address\r\n";

            }

        }

        $profile_elements = $profile->ElementsSocial;

        foreach($profile_elements as $profile_element) {

            $contact_href = "";
            $element_type = "";

            $profile_element->value = str_replace("\r\n",";", $profile_element->value);
            $profile_element->value = str_replace("\r",";", $profile_element->value);
            $profile_element->value = str_replace("\n",";", $profile_element->value);

            $ie++;

            if ($profile_element->sub_type == "facebook") {
                $element_type = "facebook";
            }else if ($profile_element->sub_type == "instagram") {
                $element_type = "instagram";
            }else if ($profile_element->sub_type == "twitter") {
                $element_type = "twitter";
            }else if ($profile_element->sub_type == "tiktok") {
                $element_type = "tiktok";
            }else if ($profile_element->sub_type == "whatsapp") {
                $element_type = "whatsapp";
            }else if ($profile_element->sub_type == "linkedin") {
                $element_type = "linkedin";
            }else if ($profile_element->sub_type == "pinterest") {
                $element_type = "pinterest";
            }else if ($profile_element->sub_type == "snapchat") {
                $element_type = "snapchat";
            }else if ($profile_element->sub_type == "youtube") {
                $element_type = "youtube";
            }else if ($profile_element->sub_type == "codepen") {
                $element_type = "codepen";
            }else if ($profile_element->sub_type == "github") {
                $element_type = "github";
            }


            $link = $profile_element->value;

            if($profile_element->sub_type == "instagram") $link = "https://www.instagram.com/".$profile_element->value;
            if($profile_element->sub_type == "twitter") $link = "https://www.twitter.com/".$profile_element->value;
            if($profile_element->sub_type == "snapchat") $link = "https://www.snapchat.com/add/".$profile_element->value;
            if($profile_element->sub_type == "tiktok") $link = "https://www.tiktok.com/".$profile_element->value;
            if($profile_element->sub_type == "whatsapp") $link = "http://api.whatsapp.com/send?phone=".$profile_element->value;


            $vCard .= "item".$ie.".URL:" . $link . "\r\n";
            $vCard .= "item".$ie.".X-ABLABEL:" . $element_type . "\r\n";



        }

        $profile_elements =$profile->ElementsLinks;

        foreach($profile_elements as $profile_element) {

            $contact_href = "";
            $element_type = "";

            $profile_element->value = str_replace("\r\n",";", $profile_element->value);
            $profile_element->value = str_replace("\r",";", $profile_element->value);
            $profile_element->value = str_replace("\n",";", $profile_element->value);

            $ie++;


            if ($profile_element->sub_type == "facebook") {
                $element_type = "facebook";
            }else if ($profile_element->sub_type == "instagram") {
                $element_type = "instagram";
            }else if ($profile_element->sub_type == "twitter") {
                $element_type = "twitter";
            }else if ($profile_element->sub_type == "tiktok") {
                $element_type = "tiktok";
            }else if ($profile_element->sub_type == "whatsapp") {
                $element_type = "whatsapp";
            }else if ($profile_element->sub_type == "linked-in") {
                $element_type = "linkedin";
            }else if ($profile_element->sub_type == "pinterest") {
                $element_type = "pinterest";
            }else if ($profile_element->sub_type == "snapchat") {
                $element_type = "snapchat";
            }else if ($profile_element->sub_type == "youtube") {
                $element_type = "youtube";
            }else if ($profile_element->sub_type == "codepen") {
                $element_type = "codepen";
            }else if ($profile_element->sub_type == "github") {
                $element_type = "github";
            }else if ($profile_element->sub_type == "custom") {
                $element_type = "custom";
            }

            $vCard .= "item".$ie.".URL:" . $profile_element->value . "\r\n";

            //$vCard .= "item".$ie.".X-ABLABEL:".$element_type."\r\n";

            if ($profile_element->value != '') $vCard .= "item".$ie.".X-ABLABEL:".$profile_element->value."\r\n";
            else $vCard .= "item".$ie.".X-ABLABEL:".$element_type."\r\n";
        }




        $profile->about = preg_replace("/(\/[^>]*>)([^<]*)(<)/","\\1\\3",$profile->about);
        $profile->about = preg_replace("/[\r\n]*/","",$profile->about);
        $profile->about = str_replace(array("\r","\n"),"",$profile->about);


        $vCard .= "NOTE:".$profile->about."\r\n";

        $vCard .= "END:VCARD\r\n";


        //dd($vCard);



        $file = "contact.vcf";
        $txt = fopen($file, "w") or die("Unable to open file!");
        /*fwrite($txt, $vCard);
        fclose($txt);*/


        return response($vCard)
            ->header('Content-Type', 'application/vcf; charset=UTF-8')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Disposition', 'attachment; filename='.basename($file))
            ->header('Expires', '0')
            ->header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'public')
            ->header('Content-Length', filesize($file));


        /*return view('vcf',[
            'id' => $profile_id,
            'profile' => $profile[0],
            'user' => $usere,
            'location' => 'vcf'
        ]);*/
    }


    public function Activation($email){

        $data = User::where('email',$email)->firstOrFail();
        $data->is_active='active';
        $data->save();

        Auth::guard('web')->login($data);

        $profile = Profile::where('user_id',$data->id)->firstOrFail();

        return redirect('Profile_elements/'.$profile->id)->with('message', 'تم العملية بنجاح ');
    }

    public function slider($id){
        $data = Profile::findOrFail($id);

        return view('User.Auth.slideshow',compact('data'));

    }
    public function getslider(Request $request){
        $data = Profile::findOrFail($request->profile_id);
        if($request->value != 0){
            $slider=ProfileElement::where('profile_id',$request->profile_id)->where('type','image')->where('category_id',$request->value)->get();
        }
        $category=$data->ElementsImage;

        return view('User.Auth.getslider',compact('slider'));

    }

    public function mailsignatures($code){
        $data = Profile::where('profile_url',$code)->firstOrfail();
        return view('User.email_signture',compact('data'));
    }

    public function searchDepartment(Request $request){
        if(isset($request->search)){
            $Categories = Category::where('profile_id',$request->id)->where(function ($q) use ($request){
                $q->where('ar_title',$request->search)->Orwhere('en_title',$request->search);
            })->get();
        }else{
            $Categories = Category::where('profile_id',$request->id)->whereNull('parent_id')->get();
        }

        $data = Profile::find($request->id);

        return view('user.Auth.subCategorySearch',compact('Categories','data'));
    }
}
