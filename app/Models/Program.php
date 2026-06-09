<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class Program extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'outcomes',
        'duration',
        'price',
        'image_url',
        'instructor',
        'certificate_included'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
