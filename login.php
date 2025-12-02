<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Clogin.css">
</head>

<body>
    <section class="login-screen" aria-labelledby="login-title">
        <div class="login-card" role="form" aria-label="formulário de Login">
            <h1 id="login-title">PYQUEST</h1>
            <form id="loginForm">
                <label for="email">E-mail</label>
                <input type="email" id="email" placeholder="Digite seu e-mail" required aria-required="true" />
                <label for="password">Senha</label>
                <input type="password" id="password" placeholder="**********" required aria-required="true" />
                <button type="submit">ENTRAR</button>
            </form>
            <a href="register.php" class="register" role="button" tabindex="0">Cadastre-se</a>
            <div class="error" id="loginError" aria-live="polite"></div>
        </div>
    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/intro.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.0.0/introjs.min.css" />
    <script type="module">
    import { login } from './scripts/auth.js';
    import i18next from './scripts/i18n.js';
    
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const errorEl = document.getElementById('loginError');
        await login(email, password, errorEl);
});

if (!localStorage.getItem('tourCompleted')) {
  introJs().setOptions({
    steps: [
      { element: '#loginForm', intro: 'Preencha seus dados para entrar.' },
      { element: '.register', intro: 'Clique aqui para se cadastrar.' }
    ]
  }).oncomplete(() => localStorage.setItem('tourCompleted', true)).start();
}
</script>

</body>
</html>