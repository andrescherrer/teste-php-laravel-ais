<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Importar Documento</title>
</head>
<style>
 .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #D0E4E8;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.content {
  margin: auto;  
}

form {
    padding: 30px;
    border: 1px solid #00808D;
    border-radius: 25px;
}

form label {
    font-size: 1rem;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

button {
    background-color: #00808D;
}

</style>
<body class="container">
    <div class="content">        
        <form action="{{ route('document.import')}}" method="post">
            @csrf            
            <label for="filename">Arquivo JSON</label>
            <input type="text" name="filename" id="filename" value="{{ old('filename') }}">
            <input type="submit" value="Importar">
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
        </form>
    </div>
</body>
</html>