<?php

namespace Aaran\Sundar\Models\Credit;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditInterest extends Model
{

    public $timestamps = false;

    protected $guarded = [];

    public static function search(string $searches): Builder
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function creditBook(): BelongsTo
    {
        return $this->belongsTo(CreditBook::class);
    }

}
