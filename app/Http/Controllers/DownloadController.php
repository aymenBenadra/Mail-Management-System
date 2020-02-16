<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Downloads a document when requested.
     *
     * @param string $filename
     * @return Response
     */
    public function download($filename)
    {
        //$file = Storage::get($request->filepath);
        //return \response()->download($file);
        return \response()->download(storage_path().'/App/public/attachments/'.$filename);
    }
}
