<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Participantes</title>
</head>
<body>
    <h1>Cadastro</h1>

    {{-- Mensagens de sucesso ou erro --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="/cadastro" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>