<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYQUEST - Módulo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="css/Cmoduloo.css">
</head>

<body>
   
 <main class="main">
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

    <div class="module-header" id="moduleTitle">FUNÇÕES</div>
    <div class="timeline" id="timeline" role="list" aria-label="Etapas do módulo"></div>
    
    <div class="container">
        <section class="quiz-section">
            <div class="quiz-box">
                <h1>FUNÇÕES</h1>
                <div class="quiz-header">
                    <span>PYQUEST</span>
                    <span class="header-score">Pontuação: 0 / 5</span>
                </div>

                <h2 class="question-text">O que acontece quando uma função em Python é chamada, mas não contém a instrução return?</h2>

                <div class="option-list">
                    <!--<div class="option">
                        <span>O programa gera um erro, pois toda função precisa retornar algo.</span>
                    </div>
                    <div class="option">
                        <span>A função retorna o valor 0 por padrão.</span>
                    </div>
                    <div class="option">
                        <span>A função retorna o valor especial None.</span>
                    </div>
                    <div class="option">
                        <span>A função repete sua execução até encontrar um return.</span>
                    </div> -->
                </div>

                <div class="quiz-footer">
                    <span class="question-total">1 de 5 questões</span>
                    <button class="next-btn">Próximo</button>
                </div>
            </div>
        </section>
        
        <section class="module-screen">        
            <main class="main-content" role="main">
                <button class="QuizzBtn">01</button>
                <br>
                <button class="QuizzBtn">02</button>
                <br>
                <button class="QuizzBtn">03</button>
                <br>
                <button class="QuizzBtn">04</button>
            </main>
        </section>
    </div>
 </main>

    <div class="popup-info">
      <h2>FUNÇÃO</h2>
      <span class="info">1. O que é uma função e por que usamos funções em Python </span>
      <span class="info">2. Diferença entre declarar e chamar uma função </span>
      <span class="info">3. Parâmetros e argumentos — como enviar dados para uma função </span>
      <span class="info">4. return: Quando usar e como ele muda o comportamento da função </span>
      <span class="info">5. Funções sem retorno e retorno padrão None  </span>

      <div class="btn-group">
        <button class="info-btn exit-btn"> Sair </button>
        <a href="#" class="info-btn continue-btn">Continuar</a>
      </div>
    </div>


    <script src="js/quizz.js"></script>
    <script src="js/modulo.js"></script>
  </body>
</html>