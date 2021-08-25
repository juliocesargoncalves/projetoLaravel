 {{ $slot }}

 <form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
        @if($errors->has('nome'))
           <div class="msg-erro">  
                {{$errors->first('nome')}} 
            </div>
        @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
        @if($errors->has('telefone'))
           <div class="msg-erro">  
                {{$errors->first('telefone')}} 
            </div>
        @endif
        <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
        @if($errors->has('email'))
            <div class="msg-erro">  
                {{$errors->first('email')}} 
            </div>
        @endif
        <br>
    <select name="motivo_id" class="{{ $classe }}">
    
        <option value="">Qual o motivo do contato?</option>
            @foreach($motivo as $key => $valor)
                <option value="{{$valor->id}}" {{old('motivo_id') == $valor->id ? 'selected' : ''}}>{{$valor->motivo}}</option>
            @endforeach
    </select>
     @if($errors->has('motivo_id'))
            <div class="msg-erro">  
                {{$errors->first('motivo_id')}} 
            </div>
        @endif
        <br>
    <textarea class="{{ $classe }}" name="mensagem">{{(old('mensagem') != '' ? old('mensagem') : 'Preencha sua mensagem')}}</textarea>
        <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

