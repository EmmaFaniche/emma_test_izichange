@extends('layouts.prodlayout')

@section('contenu')


    <table class="table table-striped">
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


@endsection



