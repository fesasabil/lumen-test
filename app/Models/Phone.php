<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Phone extends Model
{
	protected $table = 'phone';

	protected $fillable = [
        'user_id', 'number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}