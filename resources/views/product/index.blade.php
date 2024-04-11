@extends('layouts.prodlayout')

@section('contenu')

        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Pris Ht</th>
            <th scope="col">Date Création</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <th scope="row">{{$int++}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->priceHt}}</td>
            <td>{{$product->creationDate}}</td>
            <td>

            </td>
            </tr>
            @endforeach
        
        </tbody>
        </table>
@endsection



