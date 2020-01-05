<?php


namespace Modules\System\Entities;


use Illuminate\Support\Str;
use Laravel\Passport\PersonalAccessClient;

class PassportPersonalAccessClient extends PersonalAccessClient
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Str::orderedUuid()->toString();
        });
    }
}