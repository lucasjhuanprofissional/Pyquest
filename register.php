<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Cadastro</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cregister.css">
</head>

<body>
    <section class="register-screen" aria-labelledby="register-title">
        <div class="register-card" role="form" aria-label="formulário de Cadastro">
            <h1 id="register-title">Cadastre-se</h1>
            <form id="registerForm">
                <label for="regName">Nome</label>
                <input type="text" id="regName" placeholder="Digite seu nome" required aria-required="true" />
                <label for="regEmail">E-mail</label>
                <input type="email" id="regEmail" placeholder="Digite seu E-mail" required aria-required="true" />
                <label for="regPassword">Senha</label>
                <input type="password" id="regPassword" placeholder="**********" required aria-required="true" />
                <button type="submit">CADASTRAR</button>
            </form>
            <a href="login.php" class="login" role="button" tabindex="0">Já tem conta? Login</a>
            <div class="error" id="registerError" aria-live="polite"></div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
<script type="module">
import { register } from './scripts/auth.js';
import i18next from './scripts/i18n.js';

const registerForm = document.getElementById('registerForm');
registerForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const name = document.getElementById('regName').value;
  const email = document.getElementById('regEmail').value;
  const password = document.getElementById('regPassword').value;
  const errorEl = document.getElementById('registerError');
  await register(email, password, name, errorEl);
  if (!errorEl.textContent) {
    window.location.href = 'login.html'; // Redireciona para login após cadastro
  }
});

if (!localStorage.getItem('registerTourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '#registerForm', intro: 'Preencha seus dados para cadastrar.' },
      { element: '.login', intro: 'Clique aqui para ir ao login.' }
    ]
  }).oncomplete(() => localStorage.setItem('registerTourCompleted', true)).start();
}
</script>

</body>
</html>