<?php

namespace App\Http\Controllers;

use App\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsPosts = NewsPost::orderBy('created_at', 'desc')->paginate(20);
        return view('newsPost.index', compact('newsPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsPost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locale = $request->input('locale');
        $content = htmlentities($request->input('content'));
        $newsPost = NewsPost::create(compact('locale', 'content'));

        return redirect()->route('news.index')->with('status', 'Created id: ' . $newsPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newsPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newsPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPost $newsPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newsPost)
    {
        //
    }
}
