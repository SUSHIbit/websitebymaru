<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image_path',
        'description',
        'sort_order'
    ];

    protected $casts = [
        'sort_order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($image) {
            if (is_null($image->sort_order)) {
                $maxOrder = static::where('project_id', $image->project_id)->max('sort_order');
                $image->sort_order = $maxOrder ? $maxOrder + 1 : 1;
            }
        });

        static::deleting(function ($image) {
            // Delete from public directory instead of storage
            $imagePath = public_path($image->image_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute()
    {
        // Return asset URL instead of storage URL
        return asset($this->image_path);
    }

    public function getIsMainImageAttribute()
    {
        return $this->sort_order === 1;
    }

    public function scopeMainImage($query)
    {
        return $query->where('sort_order', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}