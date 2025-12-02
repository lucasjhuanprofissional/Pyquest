<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Início</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cinicio.css">
</head>

<body>
  
    <header class="nav" role="navigation" aria-label="Navegação principal">
        <div class="logo">PYQUEST</div>
        <ul>
            <li><a href="#" class="active">INÍCIO</a></li>
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

    <div class="modules-screen">
        <aside class="sidebar" aria-label="Informações do usuário">
            <div class="avatar"></div>
            <h2 id="sidebarName">Nome Ronaldo</h2>
            <div class="info"></div>
            <div class="badges" id="badges"></div>
        </aside>

        <main class="main-content" role="main">
            <h1>MÓDULOS</h1>
            <div class="grid" role="list" aria-label="Lista de módulos" id="moduleGrid"></div>
        </main>
    </div>

<script type="module">
// ===== CONFIGURAÇÃO DE MÓDULOS =====
const user = JSON.parse(localStorage.getItem('user')) || { 
  name: 'Nome Ronaldo', 
  progress: {}, 
  badges: [], 
  points: 0 
};


// Módulos
const modules = [
  { id: 'introducao', label: 'Introdução', color: 'rgb(38, 197, 157)', icon: '', clickable: true },
  { id: 'variaveis', label: 'Variáveis', color: '#F0F', icon: '', clickable: false },
  { id: 'funcoes', label: 'Funções', color: '#0F0', icon: '', clickable: false },
  { id: 'excecoes', label: 'Exceções', color: '#FF0', icon: '', clickable: false },
  { id: 'lacos', label: 'Laços', color: '#0F0', icon: '', clickable: false },
  { id: 'oop', label: 'OOP', color: '#0FF', icon: '', clickable: false },
  { id: 'dados', label: 'Dados', color: '#F0F', icon: '', clickable: false },
  { id: 'projetos', label: 'Projetos', color: '#FF0', icon: '', clickable: false }
];

// ===== FUNÇÕES DE INTERFACE =====
function loadUserData() {
  updateUI(user);
  checkCertification(user.progress);
}

function updateUI(userData) {
  document.getElementById('userName').textContent = userData.name;
  document.getElementById('sidebarName').textContent = `${userData.name} (Pontos: ${userData.points || 0})`;
  renderModules(userData.progress);
}

function renderModules(progress) {
  const grid = document.getElementById('moduleGrid');
  grid.innerHTML = '';
  modules.forEach(mod => {
    const moduleEl = document.createElement('div');
    moduleEl.classList.add('module');
    if (!mod.clickable) {
      moduleEl.classList.add('locked');
    }
    moduleEl.tabIndex = 0;
    moduleEl.role = 'button';
    moduleEl.ariaLabel = `Módulo ${mod.label}`;
    if (mod.clickable) {
      moduleEl.onclick = () => window.location.href = `module.php?module=${mod.id}`;
      moduleEl.addEventListener('keydown', (e) => { if (e.key === 'Enter') moduleEl.onclick(); });
    }
    moduleEl.innerHTML = `
      <div class="circle" style="background: ${mod.color};">
        ${mod.icon ? `<img src="${mod.icon}" alt="${mod.label}" />` : ''}
      </div>
      <div class="label">${mod.label}</div>
    `;
    grid.appendChild(moduleEl);
  });
}

loadUserData();
</script>

</body>
</html>