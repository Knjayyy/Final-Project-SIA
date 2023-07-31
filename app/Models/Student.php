<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded;

    protected $appends = ['picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->img ? asset('uploads/img/' . $this->img) : "https://sportlinx360.com/sites/default/files/public_uploads/Website_content/Website_Logos/graduate-student-avatar.png";
        return $url;
    }

}
