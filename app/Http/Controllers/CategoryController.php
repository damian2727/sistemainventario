<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\facades\Redirect;
use Laracasts\Flash\Flash;
use DB;
use Auth;

class CategoryController extends Controller
{



      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
    	if($request)
    	{
            
    		$query=trim($request->get('searchText'));
    		$categories = DB::table('categories')->where('nombre', 'LIKE', '%'.$query.'%')->orderBy('id', 'desc')->paginate(7);

    		return view('almacen.category.index', ["categories" => $categories, "searchText" => $query]);
            dd($request);
    	}else{

           
        }

    	
    }

    public function show($id)
    {

    	
    	return view("almacen.category.show", ["category"=>Category::findOrFail($id)]);
    }

    public function create()
    {
    	return view("almacen.category.create");
    }

    public function store(CategoryFormRequest $request)
    {

    	$categories = Category::all('nombre');
    	


    	$category = new Category;
    	$category->nombre = $request->get('nombre');
    	//if($category->nombre != $categories->nombre){
    	$category->descripcion = $request->get('descripcion');
    	$category->save();
    	//dd($category);
    	//	}
    	Flash::success("Se ha creado la Categoria " . $category->nombre . " de Forma exitosa!");
        return redirect()->route('category.index');
    	//return Redirect::to('');

    }

    public function edit()
    {
    	return view("almacen.category.edit", ["category"=>Category::findOrFail($id)]);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
