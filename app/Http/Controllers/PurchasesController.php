<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash;
use App\Article;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Renponse;
use Carbon\Carbon;
use App\Http\Requests\PurchaseFormRequest;
use App\Purchase;
use App\Detail_purchase;
use App\Http\Requests;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

class PurchasesController extends Controller
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
            $purchases=DB::table('purchases as p')
            ->join('providers as pro', 'p.provider_id', '=', 'pro.id')
            ->join('detail_purchase as dp', 'p.id', '=', 'dp.purchase_id')
            ->select('p.id', 'p.created_at', 'pro.nombre','p.tipofacturta', 'numerofactura', 'p.impuesto', 'p.estado', DB::raw('sum(dp.cantidad*preciocompra) as total'))
            ->where('p.numerofactura', 'LIKE','%'.$query.'%')
            ->orderBy('p.id', 'desc')
            ->groupBy('p.id', 'p.created_at', 'pro.nombre', 'p.impuesto', 'p.estado', 'p.tipofacturta', 'numerofactura')
            ->paginate(5);
            return view('purchases.purchase.index', ["purchases"=>$purchases, "searchText"=>$query]);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $providers = DB::table('providers')->get();
        $articles = DB::table('articles as art')
        ->select(DB::raw('CONCAT(art.codigobar, " ", art.nombre) AS article'), 'art.id')
        ->where('art.estado', '=', 'activo')
        ->get();
       
        return view("purchases.purchase.create", ["providers"=>$providers, "articles"=>$articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseFormRequest $request)
    {
        
       
    try{
        DB::beginTransaction();
        $purchase = new Purchase();
        
        $purchase->provider_id = $request->provider_id;
        $purchase->tipofacturta = $request->tipofacturta;
        $purchase->numerofactura = $request->numerofactura;
        $purchase->estado = 'activo';
        $purchase->impuesto = '19';
        
        $purchase->save();
        $article_id = $request->get('article_id');
       
        $cantidad = $request->get('cantidad');
        $precioventa = $request->get('precioventa');
        $preciocompra = $request->get('preciocompra');
        $cont = 0;
        
        while($cont < count($article_id)){
           
             //dd($article_id);
           
           // dd($cantidad[$cont]);
            $detailpurchase = new Detail_purchase();
            $detailpurchase->purchase_id = $purchase->id;
            $detailpurchase->article_id = $article_id[$cont];
            $detailpurchase->cantidad = $cantidad[$cont];
            $detailpurchase->precioventa = $precioventa[$cont];
            $detailpurchase->preciocompra = $preciocompra[$cont];
            //dd($article_id);
            $detailpurchase->save();
              $cont = $cont+1;
           
       
             
            
          
        }
        
        
        DB::commit();

       }catch(\Exception $e){

     
        DB::rollback();
       }
        
       return Redirect::to('purchases/purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = DB::table('purchases as p')
            ->join('providers as pro', 'p.provider_id', '=', 'pro.id')
            ->join('detail_purchase as dp', 'p.id', '=', 'dp.purchase_id')
            ->select('p.id', 'p.created_at', 'pro.nombre', 'p.impuesto', 'p.estado', DB::raw('sum(dp.cantidad*preciocompra) as total'))
            ->where('p.id', '=', $id)
            ->first();
            $detail_purchase =  DB::table('detail_purchase as dp')
            ->join('articles as a', 'dp.provider_id', '=', 'a.id')
            ->select('a.nombre as article', 'dp.cantidad', 'dp.preciocompra', 'dp.precioventa')
            ->where('dp.id', '=', $id)
            ->get();
            return view("purchases.pruchase.shoiw", ["purchase"=>$purchase, "detail_purchase"=>$detail_purchase]);
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
        $purchase = Purchase::findOrFail($id);
        $purchase->estado = 'inactivo';
        $purchase->update();
        return Redirect::to('purchases/purchase');
    }
}
