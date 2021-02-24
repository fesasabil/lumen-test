<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
	protected $table = 'address';

	protected $fillable = [
        'user_id', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}