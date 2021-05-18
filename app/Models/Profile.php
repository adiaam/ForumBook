<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    //this line to disable MassAssignmentException
    protected $guarded=[];

    public function user()
    {
        // Die Funktion belongsTo entspricht dem Fremdschlüssel für one-to-one Beziehung.
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : "profile/9qb7UAlUjC75Ll8DSyl3ulWYsA8DKVKYUlInJ72U.jpg";
        return "/storage/".$imagePath;
    }
    
}
