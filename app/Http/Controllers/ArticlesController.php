<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use Illuminate\Database\Eloquent\Collection\Lists;
use Laracasts\Flash\Flash;
use DB;
use Auth;
use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Collection\With;

class ArticlesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)


        {

          

            $query=trim($request->get('searchText'));
            $articles=DB::table('articles as a')
            ->join('categories as c', 'a.category_id', '=', 'c.id')
            ->select('a.id', 'a.nombre', 'a.codigobar', 'a.stock', 'c.nombre as categories', 'a.descripcion', 'a.estado')
            ->orwhere('a.codigobar', 'LIKE', '%'.$query. '%')
            ->orwhere('c.nombre', 'LIKE', '%'.$query. '%')
            ->orderBy('a.id', 'desc')
            ->paginate(5);
           
            $categories = Category::all(); 
            
            return view('articles.index', ["articles"=>$articles,  "searchText"=>$query]);
        }
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category = DB::table('categories')->get();

      
       //dd($categories);
       return view("articles.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $article = new Article($request->all());
        $article->estado = $request->estado;
        $article->category_id = $request->category_id;
        $article->save();

        Flash::success("Se ha creado el usuario " . $article->nombre . " de Forma exitosa!");
        return redirect()->route('articles.index');
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
        
    }
}
