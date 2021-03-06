<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lists()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        {
            $this->validate($request, [
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'big_img' => 'required|image',
                'small_img' => 'required|image',
                'client' => 'required|string',
                'category' => 'required|string',
                'description' => 'required|string',
                'description' => 'required|string',
            ]);

            $portfolios = new Portfolio;
            $portfolios->title = $request->title;
            $portfolios->sub_title = $request->sub_title;
            $portfolios->client = $request->client;
            $portfolios->category = $request->category;
            $portfolios->description = $request->description;

            $big_file = $request->file('big_img');
            Storage::put('public/img', $big_file);
            $portfolios->big_img = "storage/img/" . $big_file->hashName();

            $small_file = $request->file('small_img');
            Storage::putFile('public/img', $small_file);
            $portfolios->small_img = "storage/img/" . $big_file->hashName();

            $portfolios->save();
            return redirect()->route('admin.portfolios.create')->with('success', "portfolios data has been added  successfully");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolios  = Portfolio::find($id);
        return view('pages.portfolios.edit', compact('portfolios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { {
            $this->validate($request, [
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'client' => 'required|string',
                'category' => 'required|string',
                'description' => 'required|string',
                'description' => 'required|string',
            ]);



            $portfolios = Portfolio::find($id);
            $portfolios->title = $request->title;
            $portfolios->sub_title = $request->sub_title;
            $portfolios->client = $request->client;
            $portfolios->category = $request->category;
            $portfolios->description = $request->description;

            if ($request->file('big_img')) {
                $big_file = $request->file('big_img');
                Storage::put('public/img', $big_file);
                $portfolios->big_img = "storage/img/" . $big_file->hashName();
            }

            if ($request->file('small_img')) {
                $small_file = $request->file('small_img');
                Storage::putFile('public/img', $small_file);
                $portfolios->small_img = "storage/img/" . $big_file->hashName();
            }

            $portfolios->save();
            return redirect()->route('admin.portfolios.list')->with('success', "portfolios updated  successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $portfolio = Portfolio::find($id);
        @unlink(public_path($portfolio->big_img));
        @unlink(public_path($portfolio->small_img));
        $portfolio->delete();
        return redirect()->route('admin.portfolios.list')->with('success', "service has been deleted");
    }
}
