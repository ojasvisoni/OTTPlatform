<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Actor;
use App\Ads;
use App\Director;
use App\Genre;
use App\HomeSlider;
use App\LandingPage;
use App\Menu;
use App\Movie;
use App\Package;
use App\Season;
use App\TvSeries;
use App\PricingText;
use App\Episode;
use App\HomeTranslation;
use App\Plan;
use App\Config;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Stripe\Customer;
use Stripe\Stripe;
use App\Faq;
use App\AudioLanguage;
use App\Subtitles;
use App\Wishlist;
use App\FooterTranslation;
use DB;
use App\Blog;
use App\Adsense;
use App\PaypalSubscription;
use App\AuthCustomize;
use Reminder;
use App\WatchHistory;
use App\Multiplescreen;
use App\HomeBlock;
use App\SplashScreen;
use App\AppSlider;
use App\AppConfig;
use App\CouponCode;
use App\PackageFeature;
use App\CouponApply;
use App\seo;
use App\Button;
use App\ManualPaymentMethod;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{ 
  use SendsPasswordResetEmails;

  public function home(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $app_config = AppConfig::find(1);
    $plans = Package::with('pricing_texts')->get()->toArray();
    $plans_feature = PackageFeature::get()->toArray();
    $blog = Blog::with(['comments','comments.subcomments'])->get();
    $blogs = [];
  
    foreach($blog as $result){
      $blogs[] = array(
          'id'=>$result->id,
          'title' => $result->title,
          'detail' => strip_tags($result->detail),
          'slug' => $result->slug,
          'image' => $result->image,
          'user_id'=>$result->user_id,
          'is_active' => $result->is_active,
          'images' => $result->image,
          'created_at' => $result->created_at,
          'updated_at'=>$result->updated_at,
          'comments' => $result->comments
      );


    }
  

    $blocks = LandingPage::orderBy('position', 'asc')->get()->toArray();
    $config = Config::findOrFail(1);
    $auth_customize = AuthCustomize::first()->toArray();
    $adsense = Adsense::first()->toArray();
    $button = Button::first();
    $seo = seo::first();
    $audiolanguages = AudioLanguage::all()->toArray();
    
  
    return response()->json(array('login_img'=>$auth_customize, 'config'=>$config, 'plans' =>$plans,'plans_feature'=> $plans_feature,'blocks'=>$blocks, 'adsense' => $adsense,'blogs' => $blogs,'app_config'=>$app_config,'button' =>$button,'seo'=>$seo,'audiolanguages' => $audiolanguages), 200); 
   
  }
  public function faq(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $faqs = Faq::all()->toArray();
    return response()->json(array('faqs' =>$faqs), 200);
  }

  public function slider(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $slider = HomeSlider::all()->toArray();
    $app_slider = AppSlider::all()->toArray();

    return response()->json(array('slider'=>$slider,'app_slider'=>$app_slider), 200);
  }

  public function menu(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    $menu = Menu::all()->toArray();
    return response()->json(array('menu'=>$menu), 200);
  }
  public function movie(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $movie = Movie::with('multilinks','subtitles','label')->get()->transform(function($ms){
        
      $ms['subtitle_path'] = url('/subtitles');
      
      return $ms;
      
    });
    return response()->json(array('movie'=>$movie), 200);       
  }
  public function tvseries(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $tvseries = TvSeries::with('seasons.episodes.multilinks','seasons.episodes.subtitles')->get()->transform(function($ts){
        
      $ts['subtitle_path'] = url('/subtitles');
      
      return $ts;
      
    });
    return response()->json(array('tvseries'=>$tvseries), 200);    
  }
  public function movietv(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user(); 
    $movieTvSeries = collect();
    $movie = Movie::with('movie_series','video_link','comments.subcomments','multilinks')->get(); 
    $tvseries = TvSeries::with('seasons.episodes.video_link','comments.subcomments','seasons.episodes.multilinks')->get(); 
    $movieTvSeries = $movieTvSeries->push($movie);
    $movieTvSeries = $movieTvSeries->push($tvseries)->flatten()->toArray(); 
    $top_movies_tv = array();
    $top_movies_tv = HomeBlock::orderBy('id','desc')->where('is_active','=','1')->get();
      return response()->json(array('data'=>$movieTvSeries,'top_movies_tv'=>$top_movies_tv), 200);
  }
  public function index(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();    
   
    $actor = Actor::all()->toArray();
    $audio =  AudioLanguage::all()->toArray();
    $subtitles = Subtitles::all()->toArray();
    $director = Director::all()->toArray();
    $genre = Genre::all()->toArray();
    
    return response()->json(array( 'auth' =>$auth,'actor'=>$actor,'director'=>$director,'audio'=>$audio,'subtitles '=>$subtitles ,'genre'=>$genre), 200);   
}

  public function userProfile(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $user = Auth::user();
    $code = $user->token();
    $app_config = AppConfig::first();
    Stripe::setApiKey(env('STRIPE_SECRET'));
    if ($user->stripe_id != null) {
     $customer = Customer::retrieve($user->stripe_id);
    } 
    $current_subscription = null;
    $payment = null;
    $id = null;
    $start = null;
    $end = null;    
    $payid = null;
    $active = "0";
    $screen = null;
    $planid = null;
    $downloadlimit = null;
    $remove_ads = 0; 
    $paypal = PaypalSubscription::with('plan')->where('user_id', $user->id)->orderBy('created_at')->get();
    $current_date = Carbon::now()->toDateString();
    if (isset($customer)) {         
     $alldata = $user->subscriptions;
     $data = $alldata->last();      
    } 
    if (isset($paypal) && $paypal != null && count($paypal)>0) {
      $last = $paypal->last();
    } 
    $stripedate = isset($data) ? $data->created_at : null;
    $paydate = isset($last) ? $last->created_at : null;
    if($stripedate > $paydate){
      if($user->subscribed($data->name) && date($current_date) <= date($data->subscription_to)){
        $current_subscription = $data->name;
        $plan = Package::where('plan_id',$data->stripe_plan)->first();
        if($user->subscription($data->name)->cancelled()){ 
          $active = "0";
        }
        else{
          $active = "1";
        }
        $id = $data->id;
        $planid = $plan->id;
        $payment = 'stripe';
        $start = $data->subscription_from;
        $end = $data->subscription_to;
        $payid = $data->stripe_id;
        $screen = isset($plan) ? $plan->screens : null;
        $downloadlimit = isset($plan) ? $plan->downloadlimit : null; 
        if(isset($app_config) && $app_config->remove_ads == 1){
          $remove_ads = $plan->ads_in_app;
        }else{
          $remove_ads = 0;
        }
        

      }
    }
    elseif($stripedate < $paydate){
      if (date($current_date) <= date($last->subscription_to)) {
        if($last->package_id == 0 || $last->package_id == 100 || $last->method == 'free'){
           $current_subscription = null;
           $payment = 'Free';
        }
        else{
            $current_subscription = $last->plan->name;
            $payment = $last->method;
        }
        $id = $last->id;
        $planid = $last->package_id;
        $start = $last->subscription_from;
        $end = $last->subscription_to;
        $active = "$last->status";
        $payid = $last->payment_id;
        $screen = isset($last->plan) ? $last->plan->screens : null;
        $downloadlimit = isset($last->plan) ? $last->plan->downloadlimit :  null;
        if(isset($app_config) && $app_config->remove_ads == 1){
          $remove_ads = $last->plan->ads_in_app;
        }else{
          $remove_ads = 0;
        } 
        
      }
    }
    if($active == 1 && $screen > 0) {
      $multiplescreen = Multiplescreen::where('user_id',$user->id)->first();
      if(!isset($multiplescreen)){
        $multiplescreen = Multiplescreen::create([
          'pkg_id' => $planid,
          'user_id' => $user->id,
          'screen1' => $screen >= 1 ? $user->name :  null,
          'screen2' => $screen >= 2 ? 'screen2' :  null,
          'screen3' => $screen >= 3 ? 'screen3' :  null,
          'screen4' => $screen >= 4 ? 'screen4' :  null
               
        ]);
      }
    }    
      
    return response()->json(array('code'=>$code->id,'user'=>$user,'paypal' => $paypal, 'current_date'=> $current_date,'payment'=>$payment, 'id'=>$id,'current_subscription'=>$current_subscription, 'payid' => $payid, 'start' => $start, 'end' => $end,'active'=>$active,'screen' => $screen, 'limit' => $downloadlimit,'remove_ads' => $remove_ads), 200);
  }

  public function package(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $package = Package::all()->toArray();
    $pricingtexts = PricingText::all()->toArray();
    $package_feature = PackageFeature::get()->toArray();
    return response()->json(array('package'=>$package,'package_feature'=>$package_feature,'pricingtexts' => $pricingtexts), 200);
  }
  public function RecentMovies(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $recent = Movie::orderBy('id', 'DESC')->take(30)->get()->toArray();
    return response()->json(array('recent'=>$recent), 200);
  }

  public function Recenttvseries(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $tvseries = TvSeries::orderBy('id', 'DESC')->take(30)->get()->toArray();
    return response()->json(array('tvseries'=>$tvseries), 200);            
     
  }
  
 

public function MovieByCategory(Request $request,$id){

  $secretData = $this->CheckSecretKey($request);
    
  if($secretData != ''){
    return $secretData;
  }

    $auth = Auth::user();
    $movie = Movie::with('movie_series','video_link','comments.subcomments','multilinks')
             ->whereHas('menus',function($query) use ($id){
                $query->where('menu_id', $id);
            })->get(); 

    $tvseries = TvSeries::with('seasons.episodes.video_link','comments.subcomments','seasons.episodes.multilinks')
                  ->whereHas('menus',function($query) use ($id){
                      $query->where('menu_id', $id);
                  })->get();

    $movieCount = count($movie);
    $tvCount = count($tvseries);

    if($tvCount == 0 && $movieCount == 0){

      $movieTvSeries = null; 
      return response()->json(array('auth' =>$auth,'data'=>$movieTvSeries), 200);  
    }
    else{
      if($movieCount == 0){

         $movieTvSeries = array($tvseries); 
         return response()->json(array('auth' =>$auth,'data'=>$movieTvSeries), 200);

      }
      else{
        if($tvCount == 0){
         $movieTvSeries = array($movie); 
         return response()->json(array('auth' =>$auth,'data'=>$movieTvSeries), 200);
        }
        else{
        
         $movieTvSeries = array_merge(array($tvseries,$movie));  
         return response()->json(array('auth' =>$auth,'data'=>$movieTvSeries), 200);
        }
      }
    }   

         
  }

  public function episodes(Request $request,$id){
    
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

      $season = Season::find($id); 
      if(isset($season)){
       $episodes = Episode::with('video_link','multilinks')->where('seasons_id',$id)->get();
        return response()->json(array('episodes' =>$episodes), 200);  
      }
      else{
           return response()->json('error', 400);
        }    
  }
  
  public function updateprofile(Request $request)
  {
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();

   
    $input = $request->all();

   
      if ($file = $request->file('image')) {
        if ($auth->image != null) {      
          $image_file = @file_get_contents(public_path().'/images/user/'.$auth->image);
          if($image_file){            
            unlink(public_path().'/images/user/'.$auth->image);
          }
        }
        $name = time().$file->getClientOriginalName();
        $file->move('images/user/', $name);
        $input['image'] = $name;
      }
      if($request->new_password != NULL){
          $request->validate([
            'current_password' => 'required',
          ]);
         if (Hash::check($request->current_password, $auth->password)){
            $input['new_password'] = bcrypt($input['new_password']); 
         }
        else{
          return response()->json('error: password doesnt match', 400);
        }
      }

      if (isset($request->dob)) {
        $dateOfBirth = $request->dob;
       
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');
       $input['age'] = $age;

    }

      $auth->update([        
        'name' => isset($input['name']) ? $input['name'] : $auth->name,
        'email' =>  isset($input['email']) ? $input['email'] : $auth->email ,
        'password' => isset($input['new_password']) ? $input['new_password'] : $auth->password,
        'mobile' => isset($input['mobile']) ? $input['mobile'] : $auth->mobile,
        'dob' => isset($input['dob']) ? $input['dob'] : $auth->dob,
        'age'=> isset($input['age']) ? $input['age'] : $auth->age,
        'image' =>  isset($input['image']) ? $input['image'] : $auth->image,
      ]);
      $auth->save();
      return response()->json(array('auth' =>$auth), 200);
    
  }
  public function add_wishlist(Request $request)
  {
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    $wishlist = null;
    if($request->type == 'M'){
      $wishlist = Wishlist::where('movie_id', $request->id)
                        ->where('user_id', $auth->id)->first();
      if (isset($wishlist)){
        $wishlist->update(['added' => $request->value]);
      } 
      else {
        $wishlist = Wishlist::create([
          'user_id' => $auth->id,
          'movie_id' => $request->id,
          'added' => $request->value,
        ]);
      }
    } 
    elseif ($request->type === 'S') {
      $wishlist = Wishlist::where('season_id', $request->id)
                        ->where('user_id', $auth->id)->first();
      if (isset($wishlist)){
        $wishlist->update(['added' => $request->value]);
      } 
      else {
        $wishlist = Wishlist::create([
          'user_id' => $auth->id,
          'season_id' => $request->id,
          'added' => $request->value,
        ]);
      }
    } 
    else{
      return response()->json('error', 400);
    }   
  
    return response()->json($wishlist, 200);
  }

  public function removeseason(Request $request, $id)
  {
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    $show = Wishlist::where('season_id', $id)->where('user_id', $auth->id)->first();
    if(isset($show)){
      $show->update(['added' => '0']);
      return response()->json($show, 200);
    }else{
      return response()->json('error', 400);
    }
  }

  public function removemovie(Request $request,$id)
  {
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    $movie = Wishlist::where('movie_id', $id)->where('user_id', $auth->id)->first();
    if(isset($movie)){
      $movie->update(['added' => '0']);
      return response()->json($movie, 200);
    }
    else{
      return response()->json('error', 400);
    }
  }
   
  public function show_wishlist(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $user = Auth::user();
    $wishlist = null;
    $wishlist = Wishlist::where('user_id',$user->id)->where('added','1')->get();
    return response()->json(array('wishlist' =>$wishlist), 200);
  }

  public function check_wishlist(Request $request,$type,$id){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $user = Auth::user();
    $wishlist = null;
    if($type == 'M'){
      $wishlist = $user->wishlist->where('movie_id',$id)->first();
    }
    elseif($type == 'S'){
      $wishlist = $user->wishlist->where('season_id',$id)->first();
    }
    else{
      return response()->json('error', 400);
    }   
    if($wishlist != null){$wishlist = $wishlist->added;}
    else{$wishlist = 0;}
    return response()->json(array('wishlist' =>$wishlist), 200);
  }

  public function watch_history(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $watch_history = WatchHistory::with('movies','tvseries.seasons')
                      ->where('user_id', Auth::user()->id)->get();
    return response()->json(array('watch_history' =>$watch_history), 200); 
  }
  public function watchistorydelete(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    $history=WatchHistory::where('user_id',$auth->id)->delete();
    if(isset($history)){
      return response()->json(array('1'), 200); 
    }
    else{
      return response()->json(array('error'), 401);       
    }
  }
  public function delete_history(Request $request,$type,$id)
  {     
    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $auth = Auth::user();
    if($type == 'T'){
      $show = WatchHistory::where('tv_id', $id)->where('user_id',$auth->id)->first();
      isset($show) ? $dshow = $show->delete() : null;
    }
    elseif($type == 'M'){
      $show = WatchHistory::where('movie_id', $id)->where('user_id',$auth->id)->first();
      isset($show) ? $dshow = $show->delete() : null;
    }
    if($dshow == 1){
      return response()->json(array('1'), 200); 
    }
    else{
      return response()->json(array('error'), 401);  
    }
  }
  public function add_history(Request $request,$type,$id){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $user_id = Auth::user()->id;
    if($type == 'M'){
     $movie = Movie::findOrFail($id);
      $exists = WatchHistory::where('movie_id',$id)->where('user_id',$user_id)->first();
      if (!isset($exists) && isset($movie)) {      
        $watch = WatchHistory::create([
         'movie_id'=>$id,
         'user_id'=>$user_id,
        ]);
      }
    }
    elseif($type == 'T'){   
     $tv = TvSeries::findOrFail($id);
      $exists = WatchHistory::where('tv_id',$id)->where('user_id',$user_id)->first();
      if (!isset($exists) && isset($tv)) {        
        $watch = WatchHistory::create([
         'tv_id'=>$id,
         'user_id'=>$user_id,
        ]);
      }
    }  
    if(isset($watch) || isset($exists)){
      return response()->json(array('1'), 200); 
    }
    else{
      return response()->json(array('error'), 401);  
    }
  }

 
  public function detail(Request $request,$id){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

        $filter_video = collect();
        $all_movies = Movie::where('status', '1')->get();
        $tvseries = TvSeries::where('status', '1')->get();
        $searchKey = $id;
        $actor = Actor::where('id', 'LIKE', "%$id%")->first();

        if ($searchKey != null || $searchKey != '') {
            foreach ($all_movies as $item) {
                if ($item->actor_id != null && $item->actor_id != '') {
                    $movie_actor_list = explode(',', $item->actor_id);
                    for ($i = 0; $i < count($movie_actor_list); $i++) {
                        $check = DB::table('actors')->where('id', '=', trim($movie_actor_list[$i]))->get();
                        if (isset($check[0]) && $check[0]->id == $actor->id) {
                            $filter_video->push($item);
                        }
                    }
                }
            }
        }
        
        if (isset($tvseries) && count($tvseries) > 0) {
            foreach ($tvseries as $series) {
                if (isset($series->seasons) && count($series->seasons) > 0) {
                    foreach ($series->seasons as $item) {
                        if ($item->actor_id != null && $item->actor_id != '') {
                            $season_actor_list = explode(',', $item->actor_id);
                            for ($i = 0; $i < count($season_actor_list); $i++) {
                                $check = DB::table('actors')->where('id', '=', trim($season_actor_list[$i]))->get();
                                if (isset($check[0]) && $check[0]->id == $actor->id) {
                                    $filter_video->push($item);
                                }
                            }
                        }
                    }
                }
            }
        }
        return response()->json(array('actormovies'=>$filter_video,'actor'=>$actor), 200); 
  }

  public function coupon(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $coupon = CouponCode::all()->toArray();
    return response()->json(array('coupon'=>$coupon), 200);
  }

  public function verify_coupon(Request $request){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }
    $validator = Validator::make($request->all(), [
      'coupon_code' => 'required',
  ]);

  if ($validator->fails()) {
       $errors = $validator->errors();

      if ($errors->first('coupon_code')) {
          return response()->json(['msg' => $errors->first('coupon_code'), 'status' => 'fail'],422);
      }
      
     
  }

    $user_id = Auth::user()->id;
    $coupon = CouponCode::where('coupon_code',$request->coupon_code)->first();
    if(isset($coupon) && $coupon != NULL){
      $current_date = Carbon::now();
      if($current_date < $coupon->redeem_by){
        if($coupon->max_redemptions != 0){

          $query = $coupon->update(['max_redemptions' => $coupon->max_redemptions - 1 ]);
          $apply_coupon = CouponApply::create([
                           'user_id'=> $user_id,
                           'coupon_id'=>$coupon->id,
                           'redeem'=> 1,
                          ]);
          $response = ["message" => "Coupon is applied !"];
          return response()->json($response,200);
        }
        else{
          $response = ["message" => "Coupon is not available !"];
          return response()->json($response, 401);
        }
      }else{
        $response = ["message" => "Coupon Expired !"];
        return response()->json($response, 401);
      }
    }else{
      $response = ["message" => "Coupon Invalid !"];
        return response()->json($response, 404);
    }
  }

  public function MovieTvByLanguage(Request $request,$id){

    $secretData = $this->CheckSecretKey($request);
    
    if($secretData != ''){
      return $secretData;
    }

    $alang = AudioLanguage::find($id);
    if (isset($alang)) {
      $moviedata = collect();
      $seasondata = collect();
      $movies = Movie::where('a_language', 'LIKE', '%' . $alang->id . '%')->where('status', 1)->with('multilinks')->get();

      foreach ($movies as $movie) {
          $moviedata->push($movie);
      }

      $tvs = Season::where('a_language', 'LIKE', '%' . $alang->id . '%')->with('episodes.multilinks')->get();

      foreach ($tvs as $tv) {
          $seasondata->push($tv);
      }
      return response()->json(array('movies' => $moviedata, 'tvseries' => $seasondata),200);
    }else{
      return response()->json(array('error'),404);
    }
  }

  public function advertise(Request $request){

    $secretData = $this->CheckSecretKey($request);
    if($secretData != ''){
      return $secretData;
    }

    $advertise = Ads::get();
    return response()->json(array('advertise' => $advertise),200);
  }


  public function CheckSecretKey($request){
    $validator = Validator::make($request->all(), [
        'secret' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['message' => 'Secret Key is required'],401);
    }

    $key = AppConfig::where('generate_apikey', '=', $request->secret)->first();

    if (!$key) {
        return response()->json(['message' => 'Invalid Secret Key !'],404);
    }
  }

  

}