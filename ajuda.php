<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Ajuda</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cajuda.css">
</head>

<body>

    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="comunidade.php">Comunidade</a></li>
            <li><a href="dicionario.php">Glossário</a></li>
            <li><a href="social.php">Social</a></li>
            <li><a href="#" class="active">Ajuda</a></li>
        </ul>
        <div class="user" onclick="window.location.href = 'profile.php';">
            <div class="avatar"></div>
            <span id="userName">Nome Ronaldo</span>
        </div>
    </header>

    <main role="main" class="faq">
        <h1>Ajuda e Suporte</h1>
        <section aria-label="FAQ">
            <h2>Perguntas Frequentes</h2>
            <details>
                <summary>Como começo um módulo?</summary>
                <p>Clique no módulo desejado na página inicial e siga as etapas. Use o editor para executar código e receba feedback imediato.</p>
            </details>
            <details>
                <summary>Como executo código?</summary>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum temporibus nam iusto quae ratione officia nesciunt.</p>
            </details>
            <details>
                <summary>Problemas com Login?</summary>
                <p>Verifique suas credenciais ou cadastre-se novamente. Se persistir, envie uma mensagem abaixo.</p>
            </details>
            <details>
                <summary>Como ganho badges e pontos?</summary>
                <p>Complete exercícios (10 pontos), quizzes (20 pontos se perfeito) e módulos (badge ao 100%).</p>
            </details>
            <details>
                <summary>Como posto na comunidade?</summary>
                <p>Vá para "Comunidade", escreva e poste. Comente nos posts de outros para colaborar.</p>
            </details>
        </section>

        <section class="docs" aria-label="Documentação">
            <h2>Documentação</h2>
            <ul>
                <li><a href="" target="_blank">Tutorial Oficial Python</a></li>
                <li><a href="" target="_blank">Documentação Pandas</a></li>
                <li><a href="" target="_blank">Documentação NumPy</a></li>
                <li><a href="" target="_blank">Guia OOP em Python</a></li>
                <li><a href="" target="_blank">Pygame Docs</a></li>
                <li><a href="" target="_blank">Ideias de Projetos Python</a></li>
            </ul>
        </section>

        <section class="support-form" aria-label="Compartilhamento Social">
            <h2>Envie uma mensagem de suporte</h2>
            <form id="supportForm">
                <textarea name="supportMessage" placeholder="Descreva seu problema..." required aria-required="true"></textarea>
                <button type="submit">Enviar</button>
            </form>
            <div id="supportFeedback" aria-label="polite"></div>
        </section>
        <section class="social-share" aria-label="Compartilhamento Social">
            <h2>Compartilhe Pyquest</h2>
            <button onclick="sharedOnTwitter()">Compartilhar no Twitter/X</button>
            <button onclick="sharedOnFacebook()">Compartilhar no Facebook</button>
            <button onclick="sharedOnLinkedin()">Compartilhar no Linkedin</button>
        </section>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
<script type="module">
import i18next from './scripts/i18n.js';

const apiBase = 'http://localhost:3000';

const supportForm = document.getElementById('supportForm');
supportForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const message = document.getElementById('supportMessage').value;
  try {
    const res = await fetch(`${apiBase}/support`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message })
    });
    if (res.ok) {
      document.getElementById('supportFeedback').textContent = 'Mensagem enviada com sucesso!';
    } else {
      document.getElementById('supportFeedback').textContent = 'Erro ao enviar mensagem.';
    }
  } catch (err) {
    document.getElementById('supportFeedback').textContent = 'Erro de conexão.';
  }
});

function shareOnTwitter() {
  window.open('https://twitter.com/intent/tweet?text=Aprenda Python com PyQuest!&url=https://pyquest.example.com', '_blank');
}

function shareOnFacebook() {
  window.open('https://www.facebook.com/sharer/sharer.php?u=https://pyquest.example.com', '_blank');
}

function shareOnLinkedIn() {
  window.open('https://www.linkedin.com/shareArticle?mini=true&url=https://pyquest.example.com&title=PyQuest&summary=Aprenda Python interativamente!', '_blank');
}

if (!localStorage.getItem('ajudaTourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '.faq', intro: 'Consulte as FAQs para respostas rápidas.' },
      { element: '.docs', intro: 'Acesse documentação externa para aprofundamento.' },
      { element: '.support-form', intro: 'Envie uma mensagem se precisar de ajuda personalizada.' },
      { element: '.social-share', intro: 'Compartilhe o PyQuest nas redes.' }
    ]
  }).oncomplete(() => localStorage.setItem('ajudaTourCompleted', true)).start();
}
</script>

</body>
</html>