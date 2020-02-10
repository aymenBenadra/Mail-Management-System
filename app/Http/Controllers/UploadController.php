<?php

namespace App\Http\Controllers;

use App\Courrier;
use App\Document;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('file');
    }

    public function uploadSubmit(UploadRequest $request)
    {
        $courrier = $request->ref;
        foreach ($request->attachments as $attachment) {
            $filename = $attachment->store('attachments');
            Document::create([
                'courrier_id' => $courrier,
                'filename' => $filename
            ]);
        }
        return view('file')->with('success','File uploaded successfully!');
    }
}
