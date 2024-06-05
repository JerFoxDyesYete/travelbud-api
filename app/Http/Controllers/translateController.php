<?php
namespace App\Http\Controllers;

use App\Services\translateServices;
use Illuminate\Http\Request;

class translateController extends Controller
{
    protected $translateServices;
    
    public function __construct(translateServices $translateServices)
    {
        $this->translateServices = $translateServices;
    }

    //turn param (TEXT) and detect what language it is
    public function detect(Request $request){
        $text = $request->input('text');
        return $this->translateServices->getTranslate($text);
    }

    //get all the languages initial (possible value... fil, eng ...)
    public function languages(Request $request){
        return $this->translateServices->getLang();
    }

    public function translate (Request $request){
        $text = $request->input('text');
        $source = $request->input('source');
        $target = $request->input('target');
        return $this->translateServices->textTranslate($text, $source, $target);
    }
}