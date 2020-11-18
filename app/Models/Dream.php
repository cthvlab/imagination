<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;


class Dream extends Model
{
    use HasFactory;

    protected $table = 'dreams';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'description',
        'ip',
		'image',
        'created_at'
    ];
	
	public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
	
		

	
}