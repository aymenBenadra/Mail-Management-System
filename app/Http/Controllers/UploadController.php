<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    /**
     * Display The files upload form if requested.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadForm()
    {
        return view('file');
    }

    /**
     * upload the file if all the requirements are met.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadSubmit(UploadRequest $request)
    {
        $courrier = $request->ref;
        foreach ($request->attachments as $attachment) {
            $filepath = $attachment->store('attachments', 'public');
            $filename = basename($filepath);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            Document::create([
                'courrier_id' => $courrier,
                'filepath' => $filepath,
                'filename' => $filename,
                'type' => $ext
            ]);
        }
        session()->flash('message', 'File uploaded successfully!');
        session()->flash('alert-class', 'alert-success');
        return view('file');
    }
}
