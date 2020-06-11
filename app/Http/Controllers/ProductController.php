<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $products = Product::all(); 

        $pdf = PDF::loadView('pdf.products', compact('products'));

        return $pdf->download('listado.pdf');
    }

    public function excel()
    {
        return Excel::download(new ProductsExport, 'products-list.xlsx');
    }

    /* DEPRECATED BY THE VERSION OF Maatwebsite\Excel\Facades\Excel (2.X to 3.X);
  
    public function excel()
    {               
        Excel::create('Laravel Excel', function($excel) {
            $excel->sheet('Excel sheet', function($sheet) {
                //otra opción -> $products = Product::select('name')->get();
                $products = Product::all();                
                $sheet->fromArray($products);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }*/

}
