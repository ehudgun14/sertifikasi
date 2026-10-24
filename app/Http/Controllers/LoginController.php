<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('welcome');
    }
    public function actionlogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        
        if (Auth::attempt(['email' => $request->username, 'password' =>$request->password])) {
            session(['username' => $request->username]);
            session(['password' => $request->password]);
            return redirect()->route('dashboard');
        }
        else {
            return abort(404);
         }

        // $response = Http::asForm()->post("https://krs.widyakartika.ac.id/get_login.php", [
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ]);
       
        // if($response->body() ==  "login") {
 
        //      session(['username' => $request->username]);
        //      session(['password' => $request->password]);
        //      return redirect()->route('dashboard');
        // }   
        // else {
        //    return abort(404);
        // }
    }
}
