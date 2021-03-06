<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Classes\Structure\Sidebar;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index_bemvindo()
     {

        return view ('site.index.index_bemvindo');
     }
    public function index()
    {
        $category = Category::query()->get();
        $section = Section::query()->get();
        $user = Auth::user();

        return view('site.index.index')->with(compact('category', 'section', 'user'));
    }
    public function show_category(Request $request)
    {
        $section = Section::query()->get();
        $cat = Category::find($request->id);
        $items = Item::where('category_id', $request->id)->get();
        return view('site.index.index')->with(compact('cat', 'items', 'section'));
    }
    public function reports()
    {
        return view('site.index.index', ['section' => 'reports ']);
    }
    public function admin(){

        return view('site.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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

    public function teste(){
        $category = Category::query()->get();
        return view('site.index.test', compact('category'));
    }

    public function func(){
        return view('site.index.func');
    }
    public function consultas(){
        return view('site.index.consulta');
    }
}
