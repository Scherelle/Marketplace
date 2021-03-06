@extends('layouts.base')

@section('title', 'Ajouter un produit')

@section('css')
  @parent
  <link href="{{ asset('css/log/login.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/sellers/addProduct.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div class="core">
        <h2>Nouveau produit</h2>

        <hr></hr>

        @if(session()->get('alluser')['roleid']==1)
        <div class="form_core">
          <form class="form" method="POST" action="{{route('addProduct.post')}}" enctype="multipart/form-data">
          @csrf 
          <p class="subTitle">
              <h3>Ajoutez votre produit</h3>
            </p>
           
            @if ($errors->any())
              <div class="alert alert-warning">
                Vous n'avez pas pu ajouter votre produit &#9785;
              </div>
            @endif

            <div class="formGroupe">
              <label for="name">Nom du produit</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
              <div id="name_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="{{ old('description') }}" required>
              @error('description')
              <div id="description_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label id="img" for="image">Image</label>
              <input type="txt" id="image" name="imagetext" disabled="disabled">
              <input type="file" id="image" name="image" value="upload" required>
              @error('image')
              <div id="image_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="price">Prix par pi??ce</label>
              <input type="float" id="price" name="price" value="{{ old('price') }}"required>
              @error('price')
              <div id="price_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="formGroupe">
              <label for="category">Cat??gorie</label>
              <select name="category" id="category">
                @foreach($categories as $category)
                <option value="{{$category['categoryid']}}">{{$category['categoryname']}}</option>
                @endforeach
              </select>
            </div>

            <div class="formGroupe">
              <label for="quantity">Quantit??</label>
              <input type="integer" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
              @error('quantity')
              <div id="quantity_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            

            <div class="formGroupe">
              <input type="submit" value="VALIDER" class="buttonSub">
            </div>
          </form>
        </div>
        @else
        <div>
          Vous n'avez pas acc??s a cette page !
        </div>
        @endif

@endsection