<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Social</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Csocial.css">
</head>

<body>
    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="comunidade.php">Comunidade</a></li>
            <li><a href="dicionario.php">Glossário</a></li>
            <li><a href="#" class="active">Social</a></li>
            <li><a href="ajuda.php">Ajuda</a></li>
        </ul>
        <div class="user" onclick="window.location.href = 'profile.php';">
            <div class="avatar"></div>
            <span id="userName">Nome Ronaldo</span>
        </div>
    </header>

    <main role="main" style="padding: 2rem;">
        <h1>Social</h1>
        <input type="text" class="search-input" id="searchFriend" placeholder="Pesquisar amigos..." oninput="filterfriends()">
        <div id="friendsList">
            <!--amigos yummy-->
        </div>
        <div class="error" id="socialError" aria-live="polite"></div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
<script>
const apiBase = 'http://localhost:3000';
const token = localStorage.getItem('token');
const errorEl = document.getElementById('socialError');

async function loadFriends() {
  try {
    const res = await fetch(`${apiBase}/friends`, {
      headers: { 'Authorization': `Bearer ${token}` }
    });
    if (!res.ok) throw new Error('Erro ao carregar amigos');
    const friends = await res.json();
    const friendsList = document.getElementById('friendsList');
    friendsList.innerHTML = '';
    friends.forEach(friend => {
      const friendEl = document.createElement('div');
      friendEl.classList.add('friend');
      friendEl.innerHTML = `
        <div class="avatar"></div>
        <p>${friend.name}</p>
      `;
      friendsList.appendChild(friendEl);
    });
  } catch (err) {
    console.error('Erro ao carregar amigos', err);
    errorEl.textContent = 'Erro ao carregar amigos. Verifique sua conexão.';
  }
}

function filterFriends() {
  const input = document.getElementById('searchFriend').value.toLowerCase();
  const friends = document.querySelectorAll('.friend');
  friends.forEach(friend => {
    const name = friend.querySelector('p').textContent.toLowerCase();
    if (name.includes(input)) {
      friend.style.display = 'flex';
    } else {
      friend.style.display = 'none';
    }
  });
}

loadFriends();

if (!localStorage.getItem('socialTourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '#searchFriend', intro: 'Pesquise amigos aqui.' },
      { element: '#friendsList', intro: 'Lista de amigos.' }
    ]
  }).oncomplete(() => localStorage.setItem('socialTourCompleted', true)).start();
}
</script>

</body>
</html>