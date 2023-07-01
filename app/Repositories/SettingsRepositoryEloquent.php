<?php

namespace App\Repositories;

use App\Models\Settings;
use Illuminate\Support\Facades\Auth;

Class SettingsRepositoryEloquent implements SettingsRepository
{
    public function create($attributes)
    {
        $settings = new Settings();
        if(array_key_exists('logo',$attributes)){
            $settings->logo = $attributes['logo'];
        } else {
            $settings->logo = 0;
        }
        $settings->gmail = $attributes['email'];
        $settings->phoneno = $attributes['telno'];
        $settings->facebook_link = $attributes['fb_link'];
        $settings->insta_link = $attributes['insta_link'];
        $settings->twitter_link = $attributes['twitter_link'];
        $settings->linkedin_link = $attributes['linkedin_link'];
        $settings->location = $attributes['address'];
        $settings->map_link = $attributes['map_link'];
        $settings->footer_text = $attributes['footer_text'];
        
        $settings->save();
        return $settings;
    }

    public function get_by_id($id)
    {
        return Settings::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editSettings = $this->get_by_id($id);
        $oldImage = $editSettings->logo;

        if(array_key_exists('logo',$attributes)){
            $editSettings->logo = $attributes['logo'];
        } else {
            $editSettings->logo = $oldImage;
        }
        $editSettings->gmail = $attributes['email'];
        $editSettings->phoneno = $attributes['telno'];
        $editSettings->facebook_link = $attributes['fb_link'];
        $editSettings->insta_link = $attributes['insta_link'];
        $editSettings->twitter_link = $attributes['twitter_link'];
        $editSettings->linkedin_link = $attributes['linkedin_link'];
        $editSettings->location = $attributes['address'];
        $editSettings->map_link = $attributes['map_link'];
        $editSettings->footer_text = $attributes['footer_text'];
        
        $editSettings->save();
        return $editSettings;

    }
}
