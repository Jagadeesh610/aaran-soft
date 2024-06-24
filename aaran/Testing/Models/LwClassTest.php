<?php

namespace Aaran\Testing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LwClassTest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): LwClassTest
    {
        return new LwClassTest();
    }
}
