<?php

namespace App\Repositories;

use App\Models\About;
use App\Models\Mission;
use Illuminate\Support\Facades\Auth;

Class MissionRepositoryEloquent implements MissionRepository
{
    public function create($attributes)
    {
        $mission = new Mission();
        $mission->mission_name = $attributes['mission_name'];
        $mission->save();
        return $mission;
    }

    public function get_by_id($id)
    {
        return Mission::findorfail($id);
    }

    public function update($attributes, $id)
    {
        $editMission= $this->get_by_id($id);

        $editMission->mission_name = $attributes['mission_name'];
        $editMission->save();
        return $editMission;

    }
}
