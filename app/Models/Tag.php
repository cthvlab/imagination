<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dream;

class Tag extends Model
{	
	use HasFactory;
	
	protected $table = 'tags';
    public $timestamps = true;
  
    protected $fillable = [
        'name',
		'ip',
        'created_at'
    ];
	
	
	
    /**
     * Many to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongToMany
     */
    public function dreams()
    {
        return $this->belongsToMany(Dream::class);
    }
	
	
}
