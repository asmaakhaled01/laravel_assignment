<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller {

    public function showFilm(Request $request) {
        $apiURL = route('showFilmApi', ['slug' => $request->slug]);
        return view('showfilm',['apiURL' => $apiURL]);
    }
    
    public function createFilm(Request $request) {
        echo "in web createFilm";
        exit;
    }    
    
}
