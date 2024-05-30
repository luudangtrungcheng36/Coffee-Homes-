<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = new News();

        $new->name = $request->input('name');
        $new->content = $request->input('content-new');
        $new->description = $request->input('des');
        if($request->image) {
            $image = $request->image->hashName();
            $request->image->move(public_path('uploads/news'), $image);
            $new->image = $image;
        }

        $new->save();
        return redirect()->route('new.index')->with('success', 'Thêm tin tức thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $new)
    {
        $newdetail = News::find($new->id);
        return view('backend.news.edit', compact('newdetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $new)
    {
        $new->name = $request->input('name');
        $new->content = $request->input('content-new');
        $new->description = $request->input('des');
        if($request->image) {
            $image = $request->image->hashName();
            $request->image->move(public_path('uploads/news'), $image);
            $new->image = $image;
        }

        $new->save();

        return redirect()->route('new.index')->with('success', 'Cập nhập tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
