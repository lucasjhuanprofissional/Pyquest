<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Perfil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cprofile.css">
</head>

<body>

    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="inicio.php">INÍCIO</a></li>
            <li><a href="comunidade.php">Comunidade</a></li>
            <li><a href="dicionario.php">Glossário</a></li>
            <li><a href="social.php">Social</a></li>
            <li><a href="ajuda.php">Ajuda</a></li>
        </ul>
        <div class="user" onclick="window.location.href = 'profile.php';">
            <div class="avatar"></div>
            <span id="userName">Nome Ronaldo</span>
        </div>
    </header>

    <div class="profile-screen">
        <aside class="sidebar" aria-label="Detalhes do Perfil">
            <div class="avatar"></div>
            <h2 id="profileName">Nome Ronaldo</h2>
            <div class="friends" id="friends">Amigos: 0</div>
            <div class="achievements">
                <h3>CONQUISTAS</h3>
                <div class="achievements-box" id="achievementsBox"></div>
            </div>
        </aside>
        <main class="main-content" role="main">
            <h1>CONFIGURAÇÃO DA CONTA</h1>
            <form id="profileForm" aria-label="Formulário de edição de perfil">
                <label for="name">Nome</label>
                <input type="text" id="name" required aria-required="true">
                <label for="email">E-Mail</label>
                <input type="email" id="email" required aria-required="true" disabled>
                <label for="password">Nova Senha</label>
                <input type="password" id="password">
                <button type="submit">Salvar alterações</button>
            </form>
            <div class="error" id="profileError" aria-live="polite"></div>
        </main>
    </div>
    
</body>
</html>