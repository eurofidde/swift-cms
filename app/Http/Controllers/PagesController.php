<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pages;
use App\Models\User;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index
     * 
     * Displays all the pages
     */
    public function index()
    {
        $pages = Pages::all();
        return view('pages.pages', compact('pages'));
    }

    /**
     * Create
     * 
     * Simpily returns the create page view
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Submit
     * 
     * handles page creation submissions
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:20'],
            'body' => ['required', 'string'],
        ]);

        Pages::create([
            'title' => request('title'),
            'slug' => Str::of(request('title'))->slug('-'),
            // 'slug' => str_replace(' ', '-', request('title')),
            'body' => request('body'),
            'user_id' => auth()->user()->id,
            'template' => 'default',
        ]);

        return redirect('admin/pages');
    }

    /**
     * Edit
     * 
     * Returns a view with the page data.
     */
    public function edit($id)
    {
        $page = Pages::findOrfail($id);
        $user = User::find($page->user_id);
        $templates = array_diff(str_replace('.blade.php', '', scandir(public_path('../resources/views/page-templates'))), array('..', '.'));

        return view('pages.edit', compact('page', 'user', 'templates'));
    }

    /**
     * Submit Edit
     * 
     * Handles editing requests to pages
     */
    public function editSubmit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:40'],
            'body' => ['required', 'string'],
            'template' => ['required'],
        ]);
        
        $pages = Pages::findOrFail($id);
        $pages->update($request->all());
        $pages->save();
        return redirect('/admin/pages/edit/' . $id);
    }

    /**
     * Delete
     * 
     * Handles delete requests. This works my finding the
     * page in the database using the ID and deleting it.
     */
    public function delete(Request $request, $id)
    {
        $request = Pages::findOrFail($id);
        $request->delete($id);
        return redirect('/admin/pages');
    }


    public function viewFrontend($slug) 
    {
        $page = Pages::where('slug', $slug)->first();
        return view('page-templates.' . $page->template, compact('page'));  
    }
}
