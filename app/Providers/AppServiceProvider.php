<?php

namespace App\Providers;

use Aws\S3\S3Client;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemOperator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FilesystemOperator::class, function () {
            $options = [
                'region' => config('filesystems.disks.s3.region'),
            ];
            $client = new S3Client($options);

            $adapter = new AwsS3V3Adapter(
                $client,
                config('filesystems.disks.s3.bucket'),
            );

            return new Filesystem($adapter);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
