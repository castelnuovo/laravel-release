<?php

namespace Castelnuovo\LaravelRelease;

use Illuminate\Support\Carbon;
use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class ReleaseData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public Carbon $published_at,
        public string $version,
        public string $title,
        public string $description,
    ) {}
}
