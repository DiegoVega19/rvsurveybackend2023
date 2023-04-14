<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputType extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    
    public function questions()
    {
        return $this->belongsTo(Questions::class);
    }
    
}
