<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function data() {
        return [
            'name' => 'Arsalan Ahmed Siddique',
            'Company' => 'DevDesigns'
        ];
    }
}
