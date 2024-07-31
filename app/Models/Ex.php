<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ex extends Model
{
    use HasFactory;

    
    // Specify the table name if it is different from the default 'exes'
    protected $table = 'ex';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'user_id',
        'reason_to_separate',
        'date_of_separation',
        'date_of_start_dating',
        'phone_number'
    ];
}
