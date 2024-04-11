<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
        try
        {
            $int = 1;
            $products = Product::all();
            return view('product.index', compact('products','int'));
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $error= "Une erreur inattendue s'est produite." ;
            \Log::error($ex->getMessage());
            return $error;
        }
    }

    public function new()
    {
        return view('templates.product.new');
    }

    public function store(Request $request)
    {
        try
        {
            $validation=Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'priceHt' => 'required|numeric',
            ]);

            if($validation->fails())
            {
                $errors = $validation->errors();
                $errorMessages = '';
                foreach ($errors->all() as $message) {
                    $errorMessages .= $message . '<br>'; 
                }

                return back()->with('error', $errorMessages)->withInput();
            }

            $requestData = $request->all();
            $date = now();
            $requestData['creationDate'] = $date;
            $product = Product::create($requestData);

            return redirect()->route('product.index');
        }
        catch(\Illuminate\Database\QueryException $ex){
            $error= "Une erreur inattendue s'est produite lors de l'enregistrement." ;
            \Log::error($ex->getMessage());
            return $error;
           
        }
    }

    public function edit($id)
    {
        $product = Product::findorFail($id);
        return view('templates.product.edit', compact('product'));
        
    }

    public function update(Request $request, $id)
    {
        try
        {

            $validation=Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'priceHt' => 'required|numeric',
            ]);

            if($validation->fails())
            {
                $errors = $validation->errors();

                return back()->with('error', $errors)->withInput();
            }

            $product = Product::findOrFail($id);
            $requestData = $request->all();
            $dateUpdate = now();

            $requestData['dateUpdate'] = $dateUpdate;

            $product->update($requestData);

            return redirect()->route('product.index');
        }
        catch(\Illuminate\Database\QueryException $ex){
            $error= "Une erreur inattendue s'est produite lors de l'enregistrement." ;
            \Log::error($ex->getMessage());
            return $error;
           
        }
    }

    public function delete($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('product.index');

        } catch(\Illuminate\Database\QueryException $ex){
            $error= "Une erreur inattendue s'est produite lors de la suppression." ;
            \Log::error($ex->getMessage());
            return $error;
        }

    }
}
