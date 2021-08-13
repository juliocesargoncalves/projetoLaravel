 {{ $slot }}
 <form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $classe }}">
        <br>
    <input name="telephone" type="text" placeholder="Telefone" class="{{ $classe }}">
        <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
        <br>
    <select name="motivo" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
        <br>
    <textarea class="{{ $classe }}">Preencha aqui a sua mensagem</textarea>
        <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>