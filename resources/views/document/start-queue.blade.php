<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

p {
    font-size: 1rem;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

</style>

<body class="container">
    <form action="{{ route('document.send') }}" class="content">
        <p>Arquivo Pronto para Processamento!</p>
        <input type="submit" value="Processar">
    </form>
</body>
</html>