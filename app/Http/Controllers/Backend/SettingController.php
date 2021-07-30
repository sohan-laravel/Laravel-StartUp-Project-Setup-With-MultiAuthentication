<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('backend.setting.index');
    }
    public function update(Request $request)
    {
        $this->validate($request, [

            'site_title'  => 'required',
            'site_description' => 'nullable',
            'site_address' => 'nullable'
        ]);

        Setting::updateOrCreate(['name' => 'site_title'], ['value' => $request->get('site_title')]);
        // Update .env file
        Artisan::call("env:set APP_NAME='" . $request->site_title . "'");

        Setting::updateOrCreate(['name' => 'site_description'], ['value' => $request->get('site_description')]);
        Setting::updateOrCreate(['name' => 'site_address'], ['value' => $request->get('site_address')]);

        Toastr::success('Setting Successfully Updated', 'Success');
        return back();
    }

    public function appearance()
    {
        return view('backend.setting.appearance');
    }

    /**
     * Update Appearance
     * @return \Illuminate\Http\RedirectResponse
     */

    public function appearanceUpdate(Request $request)
    {
        if ($request->hasFile('site_logo')) {
            $this->deleteOldLogo(config('settings.site_logo'));
            Setting::set('site_logo', Storage::disk('public')->putFile('logos', $request->file('site_logo')));
        }
        if ($request->hasFile('site_favicon')) {
            $this->deleteOldLogo(config('settings.site_favicon'));
            Setting::set('site_favicon', Storage::disk('public')->putFile('logos', $request->file('site_favicon')));
        }
        Toastr::success('Setting Appearance Successfully Updated', 'Success');
        return back();
    }

    /**
     * Delete old logos from storage
     * @param $path
     */
    private function deleteOldLogo($path)
    {
        Storage::disk('public')->delete($path);
    }

    public function mail()
    {
        return view('backend.setting.mail');
    }
    public function mailUpdate(Request $request)
    {
        //return $request;

        $this->validate($request, [

            'mail_mailer'  => 'string|max:255',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|string|max:255',
            'mail_username'  => 'string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|string|max:255',
            'mail_from_name' => 'nullable|string|max:255'
        ]);

        Setting::updateOrCreate(['name' => 'mail_mailer'], ['value' => $request->get('mail_mailer')]);
        Setting::updateOrCreate(['name' => 'mail_host'], ['value' => $request->get('mail_host')]);
        Setting::updateOrCreate(['name' => 'mail_port'], ['value' => $request->get('mail_port')]);
        Setting::updateOrCreate(['name' => 'mail_username'], ['value' => $request->get('mail_username')]);
        Setting::updateOrCreate(['name' => 'mail_password'], ['value' => $request->get('mail_password')]);
        Setting::updateOrCreate(['name' => 'mail_encryption'], ['value' => $request->get('mail_encryption')]);
        Setting::updateOrCreate(['name' => 'mail_from_address'], ['value' => $request->get('mail_from_address')]);
        Setting::updateOrCreate(['name' => 'mail_from_name'], ['value' => $request->get('mail_from_name')]);

        // Update .env mail settings
        Artisan::call("env:set MAIL_MAILER='" . $request->mail_mailer . "'");
        Artisan::call("env:set MAIL_HOST='" . $request->mail_host . "'");
        Artisan::call("env:set MAIL_PORT='" . $request->mail_port . "'");
        Artisan::call("env:set MAIL_USERNAME='" . $request->mail_username . "'");
        Artisan::call("env:set MAIL_PASSWORD='" . $request->mail_password . "'");
        Artisan::call("env:set MAIL_ENCRYPTION='" . $request->mail_encryption . "'");
        Artisan::call("env:set MAIL_FROM_ADDRESS='" . $request->mail_from_address . "'");
        Artisan::call("env:set MAIL_FROM_NAME='" . $request->mail_from_name . "'");

        Toastr::success('Setting Mail Successfully Updated', 'Success');
        return back();
    }
}
