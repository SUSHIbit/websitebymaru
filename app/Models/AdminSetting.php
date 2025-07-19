<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AdminSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'description'
    ];

    public static function get($key, $default = null)
    {
        $cacheKey = 'admin_setting_' . $key;
        
        return Cache::remember($cacheKey, 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set($key, $value, $description = null)
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'description' => $description
            ]
        );

        // Clear cache
        Cache::forget('admin_setting_' . $key);
        
        return $setting;
    }

    public static function getMultiple(array $keys)
    {
        $settings = [];
        
        foreach ($keys as $key) {
            $settings[$key] = static::get($key);
        }
        
        return $settings;
    }

    public static function getContactInfo()
    {
        return static::getMultiple([
            'admin_name',
            'admin_email',
            'admin_telegram',
            'company_name',
            'company_address'
        ]);
    }

    public static function getStats()
    {
        return static::getMultiple([
            'projects_delivered',
            'client_satisfaction'
        ]);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::saved(function ($setting) {
            Cache::forget('admin_setting_' . $setting->key);
        });
        
        static::deleted(function ($setting) {
            Cache::forget('admin_setting_' . $setting->key);
        });
    }
}