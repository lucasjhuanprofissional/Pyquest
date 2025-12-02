<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Comunidade</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Ccomunidade.css">
</head>

<body>

    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="#" class="active">Comunidade</a></li>
            <li><a href="dicionario.php">Glossário</a></li>
            <li><a href="social.php">Social</a></li>
            <li><a href="ajuda.php">Ajuda</a></li>
        </ul>
        <div class="user" onclick="window.location.href = 'profile.php';">
            <div class="avatar"></div>
            <span id="userName">Nome Ronaldo</span>
        </div>
    </header>
    
    <main role="main" style="padding: 2rem;">
        <h1>Comunidade</h1>
        <form id="newPostForm" aria-label="Criar novo post">
            <textarea id="postContent" placeholder="Escreva sua dúvida ou ideia..." required aria-required="true"></textarea>
            <button type="submit">Postar</button>
        </form>
        <div id="post" role="list" aria-label="Lista de posts"></div>
        <div class="error" id="comunidadeError" aria-live="polite"></div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
<script type="module">
import i18next from './scripts/i18n.js';

const apiBase = 'http://localhost:3000';
const token = localStorage.getItem('token');
const errorEl = document.getElementById('comunidadeError');

async function loadPosts() {
  try {
    const res = await fetch(`${apiBase}/posts`, {
      headers: { 'Authorization': `Bearer ${token}` }
    });
    if (!res.ok) throw new Error('Erro ao carregar posts');
    const posts = await res.json();
    const postsDiv = document.getElementById('posts');
    postsDiv.innerHTML = '';
    posts.forEach(post => {
      const postEl = document.createElement('div');
      postEl.classList.add('post');
      postEl.innerHTML = `
        <h3>${post.title || 'Post'}</h3>
        <p>${post.content}</p>
        <form class="commentForm" data-postid="${post._id}">
          <textarea placeholder="Comente aqui..."></textarea>
          <button type="submit">Comentar</button>
        </form>
        <div class="comments">
          ${post.comments.map(comment => `<div class="comment">${comment}</div>`).join('')}
        </div>
      `;
      postsDiv.appendChild(postEl);
      postEl.querySelector('.commentForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const postId = e.target.dataset.postid;
        const content = e.target.querySelector('textarea').value;
        try {
          const res = await fetch(`${apiBase}/comments`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Authorization': `Bearer ${token}` },
            body: JSON.stringify({ postId, content })
          });
          if (!res.ok) throw new Error('Erro ao comentar');
          loadPosts();
        } catch (err) {
          errorEl.textContent = 'Erro ao comentar. Verifique sua conexão.';
        }
      });
    });
  } catch (err) {
    console.error('Erro ao carregar posts', err);
    errorEl.textContent = 'Erro ao carregar posts. Verifique sua conexão.';
  }
}

const newPostForm = document.getElementById('newPostForm');
newPostForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const content = document.getElementById('postContent').value;
  try {
    const res = await fetch(`${apiBase}/posts`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Authorization': `Bearer ${token}` },
      body: JSON.stringify({ content })
    });
    if (!res.ok) throw new Error('Erro ao postar');
    loadPosts();
  } catch (err) {
    errorEl.textContent = 'Erro ao postar. Verifique sua conexão.';
  }
});

loadPosts();

if (!localStorage.getItem('comunidadeTourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '#newPostForm', intro: 'Crie um novo post aqui para compartilhar ideias ou dúvidas.' },
      { element: '#posts', intro: 'Veja posts da comunidade e comente neles.' }
    ]
  }).oncomplete(() => localStorage.setItem('comunidadeTourCompleted', true)).start();
}
</script>

</body>
</html>