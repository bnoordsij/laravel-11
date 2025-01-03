<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use League\Flysystem\FilesystemOperator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserUploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(User $user)
    {
        $images = $user->getMedia();
        /** @var Media $image */
        $image = $images->last();
        dump(["\$user->getMedia():",
            $image,
            $image->getUrl(),
            $image->getFullUrl(),
        ]);

        return view('users.upload', compact('user'));
    }

    public function save(Request $request, User $user)
    {
        $user
            ->addMediaFromRequest('file')
            ->preservingOriginal()
            ->toMediaCollection('default', 's3');

        return back()->withSuccess('files uploaded');
    }

    public function deleteFile(Request $request, Media $media)
    {
        $media->delete();

        return back()->withSuccess('file deleted');
    }

    // @todo: cache response
    public function getFile(Media $media)
    {
        header('Content-Type: image/png');

        if ($media->disk === 's3') {
            $filesystem = $this->getFilesystemOperator();
            return $filesystem->read($media->getPath());
        }

        return file_get_contents($media->getUrl());
    }

    private function getFilesystemOperator(): FilesystemOperator
    {
        return App::make(FilesystemOperator::class);
    }
}
