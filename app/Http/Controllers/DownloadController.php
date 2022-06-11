<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($path, $url) {

        $fileUrl = "$path/$url";

        return Storage::download($fileUrl);

    }
}
