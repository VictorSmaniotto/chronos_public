<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Login - Chronos</title>

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container-login {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 50px;
    }

    .left-section {
      text-align: center;
    }

    .right-section {
      background-image: url('/mg/exports/bg-direita.png');
      background-color: rgba(0, 82, 161, 0.3);
      background-blend-mode: multiply;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container container-login">
    <div class="row">
      <div class="col-md-6 left-section">
        <img src="logo.png" alt="Logo Chronos">
        <h2>Bem-vindo(a) ao Chronos</h2>
        <h4>Seu sistema de gerenciamento de projetos</h4>
        <ul>
          <li>Benefício 1</li>
          <li>Benefício 2</li>
          <li>Benefício 3</li>
        </ul>
      </div>
      <div class="col-md-6 right-section">
        <form>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" id="password" placeholder="Digite sua senha">
          </div>
          <p>Ao clicar no botão "Entrar", você está concordando com nossos Termos de Uso e Política de Privacidade.</p>
          <button type="submit" class="btn btn-success">Entrar</button>
          <p>Não tem uma conta? Acesse a tela de cadastro clicando <a href="#" style="color: orange;">aqui</a>.</p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
