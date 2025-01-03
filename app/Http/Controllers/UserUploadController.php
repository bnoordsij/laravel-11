<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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

        return view('users.upload', compact('user'));
    }

    public function save(Request $request, User $user)
    {
        /** @var UploadedFile $file */
        $file = $request->file('file');
        $out = $file->store();

        dd(['request',
            $request->all(),
            $out,
            $file,
            $file->hashName(),
        ]);

        return back()->withSuccess('files uploaded');
    }
}
