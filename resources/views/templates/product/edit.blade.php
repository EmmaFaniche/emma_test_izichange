@extends('layouts.prodlayout')


@section('contenu')

  <div class="container" style="margin-top:5rem;">

    <div class="row shadow-lg p-3 mb-5 bg-white rounded">

      <div class="col-xl-10 col-md-12 d-flex flex-column mx-auto">
        <div class="card  mt-4">

          <div class="card-header">
            <h3 class="font-weight-black text-dark  text-center ">Modification du produit</h3>

          </div>

          <div class="card-body">
            <form action="{{route('product.update',$product->id) }}" method="post" role="form">
              @csrf

                <div class="row">
                    
                    <div class="col-6">

                        <label style="font-weight: bold; font-size:16px;"> Name</label>
                        <span style="font-weight: bold; color:red">*</span>
                        <div class="mb-3">
                        <input type="text" id="" name="name" class="form-control" value="{{ $product->name }}"  required >
                        </div>

                    </div>

                    <div class="col-6">
                        <label style="font-weight: bold;">Price Ht</label>
                        <span style="font-weight: bold; color:red">*</span>
                        <div class="mb-3">
                            <input type="number" step="0.01" name="priceHt" class="form-control"  value="{{ $product->priceHt }}" required >
                        </div>

                    </div>

                </div>
               

                <div class="text-center">
                  <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Modifier</button>

                </div>

            </form>

          </div>

        </div>
      </div>

    </div>
  </div>


@endsection
