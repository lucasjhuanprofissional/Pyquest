<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Dicionário</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cdicionario.css">
</head>

<body>

    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="comunidade.php">Comunidade</a></li>
            <li><a href="#" class="active">Glossário</a></li>
            <li><a href="social.php">Social</a></li>
            <li><a href="ajuda.php">Ajuda</a></li>
        </ul>
        <div class="user" onclick="window.location.href = 'profile.php';">
            <div class="avatar"></div>
            <span id="userName">Nome Ronaldo</span>
        </div>
    </header>

    <main role="main" style="padding: 2rem;">
        <h1>Glossário de Termos Python</h1>
        <input type="text" class="search-input" id="searchTerm" placeholder="Pesquisar Termo..." oninput="filterTerms()">
        <div id="terms">
            <div class="term">
                <h3>Variável</h3>
                <p>Um nome que se refere a um valor armazenado na memória.</p>
            </div>
            <div class="term">
                <h3>Função</h3>
                <p>Um bloco de código reutilizável que executa uma tarefa específica.</p>
            </div>
            <div class="term">
                <h3>Exceção</h3>
                <p>Um erro em tempo de execução que pode ser tratado com try-except.</p>
            </div>
            <div class="term">
                <h3>Laço</h3>
                <p>Estrutura para repetir código, como for ou while.</p>
            </div>
            <div class="term">
                <h3>Classe</h3>
                <p>Modelo para criar objetos em OOP.</p>
            </div>
            <!--add mais after depois erm erm erm erm -->
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
<script>
function filterTerms() {
  const input = document.getElementById('searchTerm').value.toLowerCase();
  const terms = document.querySelectorAll('.term');
  terms.forEach(term => {
    const title = term.querySelector('h3').textContent.toLowerCase();
    const description = term.querySelector('p').textContent.toLowerCase();
    if (title.includes(input) || description.includes(input)) {
      term.style.display = 'block';
    } else {
      term.style.display = 'none';
    }
  });
}

if (!localStorage.getItem('dicionarioTourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '#searchTerm', intro: 'Pesquise termos Python aqui.' },
      { element: '#terms', intro: 'Lista de termos e definições.' }
    ]
  }).oncomplete(() => localStorage.setItem('dicionarioTourCompleted', true)).start();
}
</script>
   
</body>
</html>