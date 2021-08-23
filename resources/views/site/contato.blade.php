@extends('site.layout.basic')
@section('content')

@section('title','Super Gestão - Contato')

    @include('site.layout.menu')

  

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">

                   @component('site.layout.form_contato',['classe'=>'borda-preta', 'motivo' => $motivo])
                        <p>A nosssa equipe analisará a sua mensagem e retornaremos o mais brevemente possível!</p>
                        <p>Nosso tempo médio de resposta é 48 hrs.</p>
                   @endcomponent

                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="img/facebook.png">
                <img src="img/linkedin.png">
                <img src="img/youtube.png">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="img/mapa.png">
            </div>
        </div>
@endsection