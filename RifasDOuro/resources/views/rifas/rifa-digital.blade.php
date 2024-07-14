@extends('layouts.main')

@section('title', 'Crie sua Rifa Digital em Minutos | Rifa Douro')

@section('content')

    <!-- Conteudo Central -->
    <div class="conteudo-central">
        <div class="centralized-content">
            <h1>Bem Vindo a Rifa digital - Rifas DOuro!</h1>
        </div>
       
        <div class="centralized-content2">
          <span>Crie e gerencie sua campanha de rifas online de forma rápida e fácil. Aumente suas chances de ganhar com a rifa digital Rifas DOuro!</span>
        </div>
    </div>
    <!-- Conteudo Central -->

    <div id="event-create-container" class="col-md-6 offset-md-3">
    <form action="/rifas/create_rifa" method="GET" enctype="multipart/form-data" id="form-act"> 
        @csrf
        <input type="submit" class="btn btn-primary" value="Vamos lá">
    </form>
</div>
      
@endsection