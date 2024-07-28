<?php

namespace App\Http\Controllers\Articulo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use PDF;

use Illuminate\Support\Facades\DB;

use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$productos = DB::table('productos')->where('estado','=','Activo')->get();

        Gate::authorize('haveaccess','almacen_inventario.index');
        $productos = DB::table('productos')
        ->where([
            ['estado','=','Activo'],
            //['stock','>',0]
        ])
        ->get();
        return view('almacen.inventory.index',['productos'=>$productos]);
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
        $productos = DB::table('productos')
        ->where([
            ['estado','=','Activo'],
            ['stock','>',0]
        ])
        ->get();

        $pdf = PDF::loadView("almacen.inventory.pdfinventory",["productos"=>$productos]);
        return $pdf->download('inventario_productos.pdf');
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

    public function generateBarcodeProducts(Request $request)
    {

        $products = DB::table('productos')
        ->where([
            ['estado','=','Activo'],
            ['stock','>',0],
            ['idarticulo','=',$request->productoId]
        ])
        ->first();
        //->get();
        //dd($products);

        $productArray = (array) $products;
        $prodArray = array_fill(0, $request->quantity, $productArray);
        //dd($prodArray);
        $prodArray = array_map(function($item) {
            $item['barcode'] = DNS1D::getBarcodeHTML($item['codigo'], 'C128'); // Add your new field here
            return $item;
        }, $prodArray);
        $productsArray = $prodArray;
        $pdf = PDF::loadView("almacen.inventory.pdf-barcode-product", compact('productsArray'));
        return $pdf->stream('barcode.pdf');
    }
}
