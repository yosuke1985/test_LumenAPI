<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $table = 'articles';

    protected $fillable = [];

//    protected $hidden = ['created_at'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    Public function user()
    {

        return $this->belongsTo(User::class);

    }


}
