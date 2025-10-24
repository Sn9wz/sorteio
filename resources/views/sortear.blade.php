<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Resultado do Sorteio</title>
  @vite(['resources/css/style.css'])
</head>
<body>
  
  <div class="sortear">
    <img src="{{ asset('images/PHPRS_logo.png') }}" alt="PHPRS_logo" class="logo">
    
    <div class="sorteio">
      <h2>🎉 Vencedores do Sorteio!</h2>
      <button id="reiniciarBtn">Reiniciar</button>
      <button id="sortearBtn">Sortear</button>
      <ul id="listaVencedores"></ul>
    </div>
  </div>
    
  <script>
    document.getElementById('reiniciarBtn').addEventListener('click', () => {
      location.reload();
    });

    let vencedoresIds = [];

    const listaVencedores = document.getElementById('listaVencedores');
    const btnSortear = document.getElementById('sortearBtn');

    btnSortear.addEventListener('click', () => {
      fetch('/sortear', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ sorteados: vencedoresIds })
      })
      .then(res => res.json())
      .then(data => {
        if(data.error) {
          alert(data.error);
          return;
        }

        vencedoresIds.push(data.id);
        const li = document.createElement('li');
        li.textContent = `${vencedoresIds.length} - ${data.nome}`;
        listaVencedores.appendChild(li);
      })
      .catch(err => {
        console.error(err);
        alert('Erro ao sortear o participante.');
      });
    });
  </script>
</body>
</html>
