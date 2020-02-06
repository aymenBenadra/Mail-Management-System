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
        $courrier = Courrier::create($request->all());
        foreach ($request->attachments as $attachment) {
            $filename = $attachment->store('photos');
            Document::create([
                'courrier_id' => $courrier->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
    }
}
