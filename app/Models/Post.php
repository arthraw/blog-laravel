<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasUuids;

    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->post_id = (string) Str::uuid();
        });
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
