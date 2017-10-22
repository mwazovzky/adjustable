<?php

namespace Mikewazovzky\Adjustable\Models;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $table = 'adjustables';

    public function changedData()
    {
        $before = json_decode($this->before, true);
        $after = json_decode($this->after, true);

        $changes = [];

        foreach ($before as $key => $value) {
            $changes[$key] = [
                'before' => strip_tags($before[$key]),
                'after' => strip_tags($after[$key])
            ];
        }

        return $changes;
    }
}
