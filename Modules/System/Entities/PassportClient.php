<?php


namespace Modules\System\Entities;


use Illuminate\Support\Str;
use Laravel\Passport\Client;

class PassportClient extends Client
{
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Str::orderedUuid()->toString();
        });
    }
}