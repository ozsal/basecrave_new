<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

Class ContactRepositoryEloquent implements ContactRepository
{
    public function create($attributes)
    {
        $contact = new Contact();
        $contact->address = $attributes['address'];
        $contact->mobNumber = $attributes['mobNumber'];
        $contact->telNumber = $attributes['telNumber'];
        $contact->email = $attributes['email'];
        $contact->fb_link = $attributes['fb_link'];
        $contact->insta_link = $attributes['insta_link'];
        $contact->twitter_link = $attributes['twitter_link'];
        $contact->linkedin_link = $attributes['linkedin_link'];
        $contact->maps = $attributes['map_link'];
        $contact->save();
        return $contact;
    }

    public function get_by_id($id)
    {
        return Contact::findorfail($id);
    }

    public function update($attributes,$id)
    {
        $editContact = $this->get_by_id($id);

        $editContact->address = $attributes['address'];
        $editContact->mobNumber = $attributes['mobNumber'];
        $editContact->telNumber = $attributes['telNumber'];
        $editContact->email = $attributes['email'];
        $editContact->fb_link = $attributes['fb_link'];
        $editContact->insta_link = $attributes['insta_link'];
        $editContact->twitter_link = $attributes['twitter_link'];
        $editContact->linkedin_link = $attributes['linkedin_link'];
        $editContact->maps = $attributes['map_link'];
        $editContact->save();
        return $editContact;

    }
}
