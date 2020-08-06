<?php

namespace App;

use App\QueryBuilder\TempatPenyewaanBuilder;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

/**
 * @property boolean terverifikasi
 */
class TempatPenyewaan extends Model
{
    protected $table = "tempat_penyewaan";
    protected $guarded = [];

    public static function query(): TempatPenyewaanBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query)
    {
        return new TempatPenyewaanBuilder($query);
    }

    public function lapangans(): HasMany
    {
        return $this->hasMany(Lapangan::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPossibleSessions()
    {
        if (empty($this->waktu_buka) || empty($this->waktu_tutup) || empty($this->panjang_sesi)) {
            return [];
        }

        $serviceOpenPeriod = CarbonPeriod::between(
            Carbon::createFromFormat("H:i:s", $this->waktu_buka),
            Carbon::createFromFormat("H:i:s", $this->waktu_tutup),
        )->setDateInterval(
            CarbonInterval::createFromFormat("H:i:s", $this->panjang_sesi)
        );

        return LazyCollection::make(function () use($serviceOpenPeriod) {
                $previous = $serviceOpenPeriod->current();
                $serviceOpenPeriod->next();

                while ($current = $serviceOpenPeriod->current()) {
                    yield CarbonPeriod::between($previous, $current);
                    $previous = $current;
                    $serviceOpenPeriod->next();
                }
            })->all();
    }
}
