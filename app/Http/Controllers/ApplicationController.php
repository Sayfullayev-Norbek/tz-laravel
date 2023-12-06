<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;


class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();

            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public'
            );
        }

        $validateData = $request->validate([

            'subject' => 'required|min:5|max:255',
            'message' => 'required',
            'file' => 'file|mimes:jpg,png,pdf'
        ]);

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null,

        ]);

        dispatch(new SendEmailJob($application));

        return redirect()->back();

    }
}
