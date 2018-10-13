<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Support\facades\Redirect;
use Renponse;
use Carbon\Carbon;
use App\Http\Requests\SaleFormRequest;
use App\Sale;
use App\Detail_sale;
//use Illuminate\Support\facades\Input;
use App\Article;
use Illuminate\Support\Collection;

class SalesController extends Controller
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
            $sales=DB::table('sales as s')
            ->join('detail_sale as ds', 's.id', '=', 'ds.sale_id')
            ->select('s.id', 's.created_at', 's.impuesto', 's.estado', 's.numerofactura', 's.totalventa')
            ->where('s.numerofactura', 'LIKE','%'.$query.'%')
            ->orderBy('s.id', 'desc')
            ->groupBy('s.id', 's.created_at', 's.impuesto', 's.estado')
            ->paginate(5);
            return view('sales.sale.index', ["sales"=>$sales, "searchText"=>$query]);
         }
      //  $sales = Sale::orderBy('id', 'ASC')->paginate(3);
       // return view('sales.sale.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = DB::table('articles as art')
        ->join('detail_purchase as di', 'art.id', '=', 'di.article_id')
        ->select(DB::raw('CONCAT(art.codigobar, " ", art.nombre) AS article'), 'art.id', 'art.stock', DB::raw('avg(di.precioventa) as preciopromedio'))
        ->where('art.estado', '=', 'activo')
        ->where('art.stock', '>=', '0')
        ->groupBY('article', 'art.id', 'art.stock')
        ->get();
       // dd($articles);
       return view('sales.sale.create', ["articles" =>$articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleFormRequest $request)
    {
       try{
        DB::beginTransaction();
         
        $sale = new Sale();
        $sale->numerofactura = $request->get('numerofactura');
        $sale->estado = 'activa';
        $sale->impuesto = '19';
        $sale->user_id = Auth::id();
        $sale->totalventa = $request->get('totalventa');
         $sale->save();
         $article_id = $request->get('article_id');
         $cantidad = $request->get('cantidad');
         $precioventa = $request->get('precioventa');
         $cont = 0;
       
        while($cont < count($article_id)){

            $detailsale = new Detail_sale();
            $detailsale->sale_id = $sale->id;
            $detailsale->article_id = $article_id[$cont];
            $detailsale->cantidad = $cantidad[$cont];
            $detailsale->precioventa = $precioventa[$cont];
            $detailsale->descuento = 0;
            //dd($detailsale);
            $detailsale->save();
            $cont = $cont+1;
        }
        
        DB::commit();

       }catch(\Exception $e){
       
       //dd($detailsale->article_id);
        DB::rollback();
       }
       return Redirect::to('sales/sale');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = DB::table('sales as s')
        ->join('detail_sale as ds', 's.id', '=', 'ds.sale_id')
        ->select('s.id', 's.created_at', 's.numerofactura', 's.impuesto', 's.estado', 's.totalventa')
        ->where('s.id', '=', $id)
        ->first();

        $detail_sales = DB::table('detail_sale as d')
        ->join('articles as a', 'd.article_id', '=', 'a.id')
        ->select('a.nombre as article', 'd.cantidad', 'd.precioventa', '')
        ->where('d.id', '=', $id)
        ->get();
        return view("sales.sale.show", ["sales"=>$sales, "detail_sales"=>$detail_sales]);
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
        $sale = Sale::findOrFail($id);
        $sale->estado = 'inactivo';
        $sale->update();
        return Redirect::to('sales/sale');
    }
}
