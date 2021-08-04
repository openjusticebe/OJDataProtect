<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Process;

class OrganisationProcessDocumentController extends Controller
{
    public function downloadDPA(Organisation $organisation, Process $process)
    {
        return 'Yeah ! Downloading DPA';
    }
}
