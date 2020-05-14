@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">

        <div class="col-md-6">

            <main role="main" class="cover-text text-center ">
                <h1 class="cover-heading">Cover de tu Pagina</h1>
                <p class="item-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quasi neque nesciunt adipisci, consequatur officia, non perspi</p>
                
                <p class="item-center mt-2">
                  <a  href="{{ route('login') }}" class="btn btn-lg btn-success">Entrar</a>
                  <a  href="{{ route('register') }}" class="btn btn-lg btn-primary">Registro</a>
                </p>
            </main>

        </div>


    </div>
    
</div>
@endsection