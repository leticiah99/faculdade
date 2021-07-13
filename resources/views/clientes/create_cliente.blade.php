@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR CLIENTE')
@section('scriptjs')
<link href="https://code.jquery.com/jquery-3.3.1.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       $('#phone')

.keydown(function (e) {
    var key = e.which || e.charCode || e.keyCode || 0;
    $phone = $(this);

// Don't let them remove the starting '('
if ($phone.val().length === 1 && (key === 8 || key === 46)) {
        $phone.val('('); 
  return false;
    } 
// Reset if they highlight and type over first char.
else if ($phone.val().charAt(0) !== '(') {
        $phone.val('('+String.fromCharCode(e.keyCode)+''); 
    }

    // Auto-format- do not expose the mask as the user begins to type
    if (key !== 8 && key !== 9) {
        if ($phone.val().length === 4) {
            $phone.val($phone.val() + ')');
        }
        if ($phone.val().length === 5) {
            $phone.val($phone.val() + ' ');
        }			
        if ($phone.val().length === 9) {
            $phone.val($phone.val() + '-');
        }
    }

    // Allow numeric (and tab, backspace, delete) keys only
    return (key == 8 || 
            key == 9 ||
            key == 46 ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));	
})

.bind('focus click', function () {
    $phone = $(this);
    
    if ($phone.val().length === 0) {
        $phone.val('(');
    }
    else {
        var val = $phone.val();
        $phone.val('').val(val); // Ensure cursor remains at the end
    }
})

.blur(function () {
    $phone = $(this);
    
    if ($phone.val() === '(') {
        $phone.val('');
    }
});
    </script>
@endsection

@section('content')

<div class="container">
    <form action="{{ route('salvar_cliente') }}" method="post"> 
    @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="nome">NOME</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror               
                </div> 
            </div>
 
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="telefone">TELEFONE</label>
                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" maxlength="14">
                    @error('telefone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div> 
 
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="logradouro">LOGRADOURO</label>
                    <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}" required autocomplete="logradouro" >
                    @error('logradouro')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>  
            </div>
            
            <div class="col-md-3">
                <div class="form-group">               
                    <label for="numero">NÚMERO</label>
                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" >
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div>

            <div class="col-md-3">
                <div class="form-group">               
                    <label for="complemento">COMPLEMENTO</label>
                    <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ old('complemento') }}" required autocomplete="complemento" >
                    @error('complemento')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                      
                </div> 
            </div>

            <div class="col-md-12">
                <div class="form-group">               
                    <label for="ponto_referencia">PONTO DE REFERÊNCIA</label>
                    <input id="ponto_referencia" type="text" class="form-control @error('ponto_referencia') is-invalid @enderror" name="ponto_referencia" value="{{ old('ponto_referencia') }}" required autocomplete="ponto_referencia" >
                    @error('ponto_referencia')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="bairro">BAIRRO</label>
                    <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro" >
                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade_id">CIDADE</label>
                    <select name="cidade_id" id="cidade_id"  class="form-select @error('cidade_id') is-invalid @enderror" name="cidade_id" value="{{ old('cidade_id') }}" required autocomplete="cidade_id">
                        <option value="">Selecione a cidade</option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}" > {{$cidade->nome}}</option>
                        @endforeach
                    </select> 
                    @error('cidade_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div> 
            </div>
         </div>
        <br>
        <button type="submit" class="btn btn-success mr-2">Cadastrar</button>
        <a href="{{route ('listar_cliente')}}" class="btn btn-danger"> Cancelar</a>
     
</div>
@endsection

