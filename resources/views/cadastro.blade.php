<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Participantes</title>
    @vite(['resources/css/style.css'])
</head>
<body>

   <img src="{{ asset('images/PHPRS_logo.png') }}" alt="PHPRS_logo" class="logo">

   <div class="container">

     <h1>Cadastro dos Participantes</h1>
     <br>
     @if (session('success'))
        <p class="success" style="color: green;">{{ session('success') }}</p>
     @endif

     @if (session('error'))
        <p class="error" style="color: red;">{{ session('error') }}</p>
     @endif
    <div class="form-grup">
     <form action="/cadastro" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Cadastrar</button>
     </form>
    </div>
   </div>
</body>
</html>