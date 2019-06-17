<?php

namespace App\Http\Controllers;

use App\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApplicationController extends Controller
{
    private $locale;

    public function __construct() {
        if (Route::current() != null) {
            $this->locale = Route::current()->parameter('locale');
            app()->setLocale($this->locale);
        }
    }

    public function showNews() {
        $newsPosts = NewsPost::where('locale', $this->locale)->orderBy('created_at', 'desc')->paginate(4);
        return view('news')->withNewsPosts($newsPosts);
    }

    public function showRapidTest() {
        return view('rapid-test');
    }

    public function showFreeCondom() {
        return view('free-condom')->withLocale($this->locale);
    }

    public function showVideos() {
        return view('videos')->withLocale($this->locale);
    }

    public function showHivPositive() {
        return view('hiv-positive')->withLocale($this->locale);
    }

    public function showJoinUs() {
        return view('join-us')->withLocale($this->locale);
    }

    public function showAboutUs() {
        return view('about-us');
    }
}
