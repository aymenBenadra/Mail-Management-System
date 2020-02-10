<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Response;

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
        return view('file')->with('success','File uploaded successfully!');
    }
}
