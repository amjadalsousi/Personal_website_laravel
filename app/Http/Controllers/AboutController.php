<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lists()
    {
        $abouts = About::all();
        return view('pages.abouts.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $this->validate($request, [
                'title1' => 'required|string',
                'title12' => 'required|string',
                'image' => 'required|image',
                'description' => 'required|string',
            ]);

            $abouts = new About;
            $abouts->title1 = $request->title1;
            $abouts->title12 = $request->title12;
            $abouts->image = $request->image;
            $abouts->description = $request->description;

            $image_file = $request->file('image');
            Storage::put('public/img', $image_file);
            $abouts->image = "storage/img/" . $image_file->hashName();

            $abouts->save();
            return redirect()->route('admin.abouts.create')->with('success', "Abouts data has been added  successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }


    public function edit($id)
    {
        $about  = About::find($id);
        return view('pages.abouts.edit', compact('about'));
    }


    public function update(Request $request, $id)
    { {
            $this->validate($request, [
                'title1' => 'required|string',
                'title12' => 'required|string',
                'description' => 'required|string',
            ]);

            $abouts = About::find($id);
            $abouts->title1 = $request->title1;
            $abouts->title12 = $request->title12;
            $abouts->image = $request->image;
            $abouts->description = $request->description;
            
            if ($request->file('image')) {
                $image_file = $request->file('image');
                Storage::put('public/img', $image_file);
                $abouts->image = "storage/img/" . $image_file->hashName();
            }


            $abouts->save();
            return redirect()->route('admin.abouts.create')->with('success', "Abouts data has been added  successfully");
        }
    }


    public function destroy($id)
    {
        $about = About::find($id);
        @unlink(public_path($about->image));
        $about->delete();
        return redirect()->route('admin.abouts.list')->with('success', "service has been deleted");
    }
}
