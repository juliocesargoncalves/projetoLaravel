<h2>View teste</h2>

@for($i = 0; $i < 10; $i++)
    Essa linha é : {{$i}} <br>
@endfor
<hr>

@php $j = 1; @endphp

@while($j < 10)
        Essa linha é : {{$j}} <br>

@php $j++ @endphp        
@endwhile