<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strategy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Definir la relación con el modelo MetricHistoryRun
    public function metricHistoryRuns()
    {
        return $this->hasMany(MetricHistoryRun::class);
    }
}
