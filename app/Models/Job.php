<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // responsible for the method call by tinker (Job::factory()->create())
// use App\Models\Job;


class Job extends Model{
    use HasFactory;  // responsible for the method call by the php artisan tinker
    protected $table = 'job_listings';

    // responsible for sqlite manipulation
    protected $guarded = []; // to allow mass assignment

    public function employer() 
    {
        return $this->belongsTo(Employer::class);
    }

//     public function tags()
//     {
//         return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listings_id");
//     }  
}
