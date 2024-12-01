<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class InfoController {

    public function getGeneral() {

        // Temporarily setting until multi-language support
        App::setLocale('de');

        return view('info/info-text');

    }

    public function getImprint() {

        // Temporarily setting until multi-language support
        App::setLocale('de');

        return view('info/imprint');

    }

    public function getPrivacyPolicy() {

        // Temporarily setting until multi-language support
        App::setLocale('de');

        return view('info/privacy_policy');

    }

}