<?php

namespace App\Repositories;

use App\Models\OpeningHour;
use Illuminate\Support\Facades\Auth;

Class OpeningHourRepositoryEloquent implements OpeningHourRepository
{
    public function create($attributes)
    {
        $openinghour = new OpeningHour();
        $openinghour->day = $attributes['day'];
        $openinghour->fromtime = $attributes['fromtime'];
        $openinghour->totime = $attributes['totime'];
        $openinghour->save();
        return $openinghour;
    }

    public function get_by_id($id)
    {
        return OpeningHour::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editopeninghour= $this->get_by_id($id);

        $editopeninghour->day = $attributes['day'];
        $editopeninghour->fromtime = $attributes['fromtime'];
        $editopeninghour->totime = $attributes['totime'];
        
        $editopeninghour->save();
        return $editopeninghour;

    }
}
