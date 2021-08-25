 {{ $slot }}

 <form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
        <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
        <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
        <br>
    <select name="motivo_id" class="{{ $classe }}">
            <option value="">Qual o motivo do contato?</option>
        @foreach($motivo as $key => $valor)
            <option value="{{$valor->id}}" {{old('motivo_id') == $valor->id ? 'selected' : ''}}>{{$valor->motivo}}</option>
        @endforeach
    </select>

        <br>
    <textarea class="{{ $classe }}" name="mensagem">{{(old('mensagel') != '' ? old('mensagem') : 'Preencha sua mensagem')}}</textarea>
        <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
<div style="position:absolute; top:0px; left:0px; background:red; width:100%">
    <pre>
        {{ print_r($errors) }}
    </pre>    
</div>