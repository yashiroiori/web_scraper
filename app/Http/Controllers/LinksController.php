<?php

namespace App\Http\Controllers;

use App\Category;
use App\Link;
use App\Website;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.link.index')->withLinks($links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $websites = Website::all();

        return view('dashboard.link.create')->withCategories($categories)->withWebsites($websites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            'website_id' => 'required',
            'category_id' => 'required'
        ]);

        $link = new Link;

        $link->url = $request->input('url');

        $link->website_id = $request->input('website_id');

        $link->category_id = $request->input('category_id');

        $link->save();

        return redirect()->route('links.index');
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
        $categories = Category::all();
        $websites = Website::all();

        return view('dashboard.link.edit')->withLink(Link::find($id))->withCategories($categories)->withWebsites($websites);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'url' => 'required',
            'website_id' => 'required',
            'category_id' => 'required'
        ]);

        $link = Link::find($id);

        $link->url = $request->input('url');

        $link->website_id = $request->input('website_id');

        $link->category_id = $request->input('category_id');

        $link->save();

        return redirect()->route('links.index');
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
    }
}
