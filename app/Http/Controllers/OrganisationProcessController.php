<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Process;



class OrganisationProcessController extends Controller
{
  public function __construct()
  {
  }

  public function show($org_slug, $process_id)
  {
    $organisation = Organisation::whereSlug($org_slug)->first();
    $process = Process::find($process_id);


    return view('organisation.process.process', compact('organisation', 'process'));
  }


  public function store($org_slug, $process_id, StoreProcessRequest $request)
  {
    $organisation = Organisation::whereSlug($org_slug)->first();
    $process = Process::find($process_id);
    $process->fill($request)->save();

    return view('organisation.process.process', compact('organisation', 'process'));
  }


  public function destroy($org_slug, $process_id)
  {
    $organisation = Organisation::whereSlug($org_slug)->first();

    $process = Process::find($process_id)->delete();

    return view('organisation.process.process', compact('organisation', 'process'));
  }





}
