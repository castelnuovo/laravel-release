<?php

namespace Castelnuovo\LaravelRelease;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;
use Throwable;

class ReleaseService
{
    public static function getVersion(): string
    {
        $result = Process::run('git describe --tags');

        if ($result->failed()) {
            return 'vUNKNOWN';
        }

        return Str::trim($result->output());
    }

    public function getCurrent(): ReleaseData
    {
        if ($release = Cache::get('laravel-release.latest', false)) {
            return $release;
        }

        $version = self::getVersion();

        $release = self::getAll()
            ->filter(fn(ReleaseData $release) => $release->version === $version)
            ->first(default: false);

        if (! $release) {
            return new ReleaseData(
                published_at: now(),
                version: $version,
                title: '',
                description: '',
            );
        }

        Cache::forever('laravel-release.latest', $release);

        return $release;
    }

    public function getAll(): Collection
    {
        if ($releases = Cache::get('laravel-release.all', false)) {
            return $releases;
        }

        try {
            $data = Http::acceptJson()
                ->baseUrl(config('release.api'))
                ->get(config('release.repository'))
                ->throw()
                ->json();
        } catch (Throwable) {
            $data = [];
        }

        $releases = ReleaseData::collect($data, Collection::class);

        Cache::forever('laravel-release.all', $releases);

        return $releases;
    }
}
