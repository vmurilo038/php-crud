<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início | UserFlow</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            color-scheme: dark;
            --fundo: #080d1b;
            --painel: #111a2e;
            --azul: #6485ff;
            --texto: #f8fafc;
            --texto-fraco: #9ba9c4;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: var(--texto);
            background:
                radial-gradient(ellipse at 15% 15%, #243b8060, transparent 40%),
                radial-gradient(ellipse at 90% 80%, #4930a52b, transparent 38%),
                var(--fundo);
            overflow-x: hidden;
        }

        a, button, input {
            font: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .fundo-luz {
            position: fixed;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: #4169e125;
            filter: blur(90px);
            pointer-events: none;
            animation: flutuar 9s ease-in-out infinite alternate;
        }

        .luz-1 {
            top: -150px;
            right: -80px;
        }

        .luz-2 {
            bottom: -190px;
            left: -100px;
            animation-delay: -4s;
            background: #7c3aed20;
        }

        .pagina {
            position: relative;
            z-index: 1;
            width: min(1120px, calc(100% - 40px));
            margin: auto;
        }

        nav {
            min-height: 90px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            animation: descer 0.7s ease both;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 21px;
            font-weight: bold;
            letter-spacing: -0.5px;
        }

        .logo {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: linear-gradient(135deg, #7292ff, #5546e9);
            box-shadow: 0 6px 25px #536cff50;
            font-size: 22px;
        }

        .marca span:last-child {
            color: #8ca4ff;
        }

        .link-gerenciar {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 11px 17px;
            border: 1px solid #ffffff1b;
            border-radius: 10px;
            color: #dce5ff;
            background: #ffffff08;
            transition: 0.25s ease;
        }

        .link-gerenciar:hover {
            border-color: #6485ff80;
            background: #6485ff15;
            transform: translateY(-2px);
        }

        .conteudo {
            min-height: calc(100vh - 110px);
            display: grid;
            grid-template-columns: 1fr 0.88fr;
            align-items: center;
            gap: 75px;
            padding: 35px 0 75px;
        }

        .apresentacao {
            animation: subir 0.8s ease both;
        }

        .etiqueta {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 13px;
            border: 1px solid #8198ff35;
            border-radius: 50px;
            color: #b8c7ff;
            background: #647fff12;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .ponto {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #79f2bc;
            box-shadow: 0 0 12px #79f2bc;
            animation: pulsar 1.8s infinite;
        }

        h1 {
            max-width: 570px;
            margin: 25px 0 20px;
            font-size: clamp(42px, 5vw, 67px);
            line-height: 1.06;
            letter-spacing: -2.8px;
        }

        h1 span {
            color: transparent;
            background: linear-gradient(100deg, #91a8ff, #6c79ff 55%, #bd9aff);
            background-clip: text;
            -webkit-background-clip: text;
        }

        .descricao {
            max-width: 480px;
            color: var(--texto-fraco);
            font-size: 16px;
            line-height: 1.85;
        }

        .vantagens {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 28px;
        }

        .vantagem {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #c9d3e8;
            font-size: 13px;
        }

        .check {
            display: grid;
            place-items: center;
            width: 21px;
            height: 21px;
            border-radius: 50%;
            color: #8cf0bd;
            background: #56d9a01a;
            font-size: 12px;
        }

        .painel {
            position: relative;
            padding: 32px;
            border: 1px solid #ffffff17;
            border-radius: 22px;
            background: linear-gradient(145deg, #17233bf2, #101729f5);
            box-shadow: 0 25px 90px #00000040, inset 0 1px #ffffff08;
            animation: subir 0.8s 0.15s ease both;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .painel:hover {
            border-color: #8096ff55;
            box-shadow: 0 28px 100px #00000050, 0 0 30px #6485ff0c;
        }

        .cabecalho-painel {
            margin-bottom: 28px;
        }

        .icone-cadastro {
            display: grid;
            place-items: center;
            width: 50px;
            height: 50px;
            margin-bottom: 21px;
            border: 1px solid #8ba0ff30;
            border-radius: 15px;
            color: #a8b8ff;
            background: linear-gradient(135deg, #6687ff2b, #8870ff13);
            font-size: 23px;
        }

        h2 {
            margin-bottom: 9px;
            font-size: 25px;
            letter-spacing: -0.7px;
        }

        .subtitulo {
            color: var(--texto-fraco);
            font-size: 14px;
            line-height: 1.6;
        }

        .campo {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: #dbe4f7;
            font-size: 13px;
            font-weight: bold;
        }

        .entrada {
            position: relative;
        }

        .entrada span {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #8192b1;
            font-size: 17px;
            pointer-events: none;
        }

        input {
            width: 100%;
            padding: 15px 15px 15px 44px;
            border: 1px solid #ffffff19;
            border-radius: 10px;
            outline: none;
            color: white;
            background: #080f20a8;
            font-size: 14px;
            transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
        }

        input::placeholder {
            color: #697995;
        }

        input:focus {
            border-color: #7890ff;
            background: #101a30;
            box-shadow: 0 0 0 4px #6485ff18;
        }

        .botao-cadastrar {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            width: 100%;
            min-height: 51px;
            margin-top: 7px;
            border: 0;
            border-radius: 10px;
            color: white;
            background: linear-gradient(100deg, #5578f7, #7056e9);
            box-shadow: 0 8px 24px #5a65ee30;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.25s, filter 0.25s;
        }

        .botao-cadastrar::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, #ffffff30, transparent);
            transform: skewX(-20deg);
            transition: left 0.6s;
        }

        .botao-cadastrar:hover::before {
            left: 150%;
        }

        .botao-cadastrar:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px #5a65ee50;
            filter: brightness(1.08);
        }

        .botao-cadastrar:active {
            transform: scale(0.985);
        }

        .aviso {
            margin-top: 17px;
            color: #8190aa;
            text-align: center;
            font-size: 12px;
            line-height: 1.6;
        }

        .linha {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 22px 0;
            color: #687792;
            font-size: 12px;
        }

        .linha::before, .linha::after {
            content: "";
            height: 1px;
            flex: 1;
            background: #ffffff12;
        }

        .link-lista {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            width: 100%;
            padding: 13px;
            border: 1px solid #ffffff1c;
            border-radius: 10px;
            color: #d7e0f5;
            background: #ffffff06;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .link-lista:hover {
            color: white;
            border-color: #8295ff60;
            background: #6485ff13;
            transform: translateY(-2px);
        }

        footer {
            padding: 0 0 25px;
            color: #687792;
            text-align: center;
            font-size: 12px;
        }

        .mensagem {
            margin-bottom: 17px;
            padding: 12px 14px;
            border: 1px solid #f8717130;
            border-radius: 9px;
            color: #fecaca;
            background: #ef444410;
            font-size: 13px;
            animation: subir 0.3s ease;
        }

        @keyframes subir {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes descer {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes flutuar {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(-40px, 45px);
            }
        }

        @keyframes pulsar {
            50% {
                opacity: 0.45;
                box-shadow: 0 0 3px #79f2bc;
            }
        }

        @media (max-width: 850px) {
            .conteudo {
                grid-template-columns: 1fr;
                gap: 40px;
                padding-top: 35px;
            }

            .apresentacao {
                max-width: 620px;
            }

            h1 {
                font-size: clamp(42px, 9vw, 60px);
            }

            .painel {
                width: 100%;
                max-width: 560px;
            }
        }

        @media (max-width: 500px) {
            .pagina {
                width: calc(100% - 28px);
            }

            nav {
                min-height: 75px;
            }

            .marca {
                font-size: 18px;
            }

            .logo {
                width: 37px;
                height: 37px;
            }

            .link-gerenciar {
                padding: 10px;
                font-size: 12px;
            }

            .painel {
                padding: 23px 19px;
                border-radius: 17px;
            }

            h1 {
                letter-spacing: -1.8px;
            }

            .descricao {
                font-size: 14px;
            }

            .vantagens {
                gap: 12px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>

<div class="fundo-luz luz-1"></div>
<div class="fundo-luz luz-2"></div>

<div class="pagina">
    <nav>
        <a href="<?= site_url('/') ?>" class="marca">
            <span class="logo">U</span>
            <span>User<span>Flow</span></span>
        </a>

        <a href="<?= site_url('usuarios') ?>" class="link-gerenciar">
            <span>☷</span>
            Gerenciar usuários
        </a>
    </nav>

    <main class="conteudo">
        <section class="apresentacao">
            <div class="etiqueta">
                <span class="ponto"></span>
                Sistema de gerenciamento
            </div>

            <h1>
                Organize seus usuários.
                <span>Do seu jeito.</span>
            </h1>

            <p class="descricao">
                Uma maneira simples e organizada de cadastrar e gerenciar
                usuários. Registre as informações e acompanhe tudo em um só lugar.
            </p>

            <div class="vantagens">
                <div class="vantagem">
                    <span class="check">✓</span>
                    Cadastro simples
                </div>

                <div class="vantagem">
                    <span class="check">✓</span>
                    Edição rápida
                </div>

                <div class="vantagem">
                    <span class="check">✓</span>
                    Dados organizados
                </div>
            </div>
        </section>

        <section class="painel">
            <div class="cabecalho-painel">
                <div class="icone-cadastro">＋</div>
                <h2>Cadastrar usuário</h2>
                <p class="subtitulo">
                    Preencha os campos abaixo para adicionar um novo usuário ao sistema.
                </p>
            </div>

            <?php if (session()->getFlashdata('erro')): ?>
                <div class="mensagem">
                    <?= esc(session()->getFlashdata('erro')) ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('usuarios/criar') ?>" method="post">
                <?= csrf_field() ?>

                <div class="campo">
                    <label for="nome">Nome completo</label>
                    <div class="entrada">
                        <span>♙</span>
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Ex.: João da Silva"
                            autocomplete="name"
                            required
                        >
                    </div>
                </div>

                <div class="campo">
                    <label for="email">Endereço de e-mail</label>
                    <div class="entrada">
                        <span>✉</span>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="voce@exemplo.com"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <button class="botao-cadastrar" type="submit">
                    Cadastrar usuário <span>→</span>
                </button>

                <p class="aviso">
                    Ao cadastrar, as informações serão salvas no sistema.
                </p>
            </form>

            <div class="linha">OU</div>

            <a href="<?= site_url('usuarios') ?>" class="link-lista">
                ☷ &nbsp; Ver usuários cadastrados
                <span>→</span>
            </a>
        </section>
    </main>

    <footer>
        UserFlow · Sistema de gerenciamento de usuários
    </footer>
</div>

</body>
</html>