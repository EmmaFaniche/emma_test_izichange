@extends('layouts.prodlayout')

@section('contenu')

<div class="container mt-4">

    <div class="row shadow-lg p-3 mb-5 bg-white rounded">
   
        <a class="btn btn-primary" href="{{ route('product.new')}}" role="button">Nouveau produit</a>

        <table class="table table-striped mt-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Date Création</th>
                <th scope="col">Date modification</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{$int++}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->priceHt}}</td>
                    <td>{{$product->creationDate}}</td>
                    <td>{{$product->dateUpdate}}</td>
                    <td>

                        <a href="{{ route('product.edit', $product->id) }}" id="btnAction" role="button"
                            data-bs-toggle="tooltip" data-bs-title="modifier" class="btn btn-outline-success">
                            Modifier
                        </a>
                        <a href="{{ route('product.delete', $product->id) }}" id="btnAction" role="button"
                            data-bs-toggle="tooltip" data-bs-title="modifier" class="btn btn-danger">
                            Supprimé
                        </a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>



@endsection



