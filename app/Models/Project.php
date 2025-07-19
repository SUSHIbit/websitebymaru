<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'price',
        'what_you_get',
        'key_features',
        'project_type_id',
        'is_active',
        'telegram_username',
        'website_link'
    ];

    protected $casts = [
        'what_you_get' => 'json',
        'key_features' => 'json',
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->hasOne(ProjectImage::class)->oldest();
    }

    public function getMainImageUrlAttribute()
    {
        $mainImage = $this->mainImage;
        return $mainImage ? asset('storage/' . $mainImage->image_path) : null;
    }

    public function getFormattedPriceAttribute()
    {
        return 'RM ' . number_format($this->price, 2);
    }

    public function getTelegramBuyLinkAttribute()
    {
        $telegramUsername = $this->telegram_username ?: config('app.default_telegram');
        $message = "Hello, I'm interested in " . $this->title . ". Is it still available?";
        return "https://t.me/{$telegramUsername}?text=" . urlencode($message);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $typeId)
    {
        return $query->where('project_type_id', $typeId);
    }
}