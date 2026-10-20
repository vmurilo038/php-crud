<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários | UserFlow</title>

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
            --fraco: #9ba9c4;
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

        button, input {
            font: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .luz {
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
            background: #7c3aed20;
            animation-delay: -4s;
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
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            animation: descer .6s ease both;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 21px;
            font-weight: bold;
            letter-spacing: -.5px;
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

        .marca-destaque {
            color: #8ca4ff;
        }

        .link {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            padding: 12px 16px;
            border: 1px solid #ffffff1b;
            border-radius: 10px;
            background: #ffffff08;
            color: #dce5ff;
            cursor: pointer;
            font-size: 13px;
            transition: .25s ease;
        }

        .link:hover {
            border-color: #8295ff70;
            background: #6485ff15;
            transform: translateY(-2px);
        }

        .conteudo {
            padding: 25px 0 65px;
            animation: subir .7s ease both;
        }

        .cabecalho {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 25px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .etiqueta {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 16px;
            padding: 8px 12px;
            border: 1px solid #8198ff35;
            border-radius: 50px;
            color: #b8c7ff;
            background: #647fff12;
            font-size: 11px;
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
            margin-bottom: 12px;
            font-size: clamp(34px, 5vw, 52px);
            letter-spacing: -2px;
        }

        h1 span {
            color: transparent;
            background: linear-gradient(100deg, #91a8ff, #6c79ff 55%, #bd9aff);
            background-clip: text;
            -webkit-background-clip: text;
        }

        .descricao {
            color: var(--fraco);
            font-size: 14px;
            line-height: 1.8;
        }

        .botao-principal {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 14px 19px;
            border: none;
            border-radius: 10px;
            color: white;
            background: linear-gradient(100deg, #5578f7, #7056e9);
            box-shadow: 0 8px 24px #5a65ee30;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: transform .25s, box-shadow .25s;
        }

        .botao-principal:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px #5a65ee50;
        }

        .estatisticas {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .estatistica {
            padding: 21px;
            border: 1px solid #ffffff12;
            border-radius: 15px;
            background: #111a2ebd;
            backdrop-filter: blur(12px);
            transition: transform .25s, border-color .25s;
            animation: subir .6s ease both;
        }

        .estatistica:nth-child(2) {
            animation-delay: .08s;
        }

        .estatistica:nth-child(3) {
            animation-delay: .16s;
        }

        .estatistica:hover {
            transform: translateY(-4px);
            border-color: #8295ff50;
        }

        .estatistica-titulo {
            margin-bottom: 12px;
            color: var(--fraco);
            font-size: 12px;
        }

        .estatistica-valor {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: -1px;
        }

        .estatistica-legenda {
            margin-top: 8px;
            color: #8494b2;
            font-size: 11px;
        }

        .cartao {
            overflow: hidden;
            border: 1px solid #ffffff17;
            border-radius: 18px;
            background: linear-gradient(145deg, #17233bf2, #101729f5);
            box-shadow: 0 25px 90px #00000025;
            transition: border-color .3s;
        }

        .cartao:hover {
            border-color: #8096ff40;
        }

        .cartao-topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 24px;
            border-bottom: 1px solid #ffffff12;
        }

        .cartao-topo h2 {
            margin-bottom: 7px;
            font-size: 18px;
        }

        .cartao-topo p {
            color: var(--fraco);
            font-size: 12px;
        }

        .busca {
            width: min(300px, 100%);
            padding: 12px 15px;
            border: 1px solid #ffffff19;
            border-radius: 9px;
            outline: none;
            color: white;
            background: #080f20a8;
            font-size: 13px;
            transition: .25s;
        }

        .busca:focus {
            border-color: #7890ff;
            box-shadow: 0 0 0 4px #6485ff18;
        }

        .tabela-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            padding: 16px 22px;
            color: #8494b2;
            background: #080f201f;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 18px 22px;
            border-top: 1px solid #ffffff0c;
            color: #dbe4f7;
            font-size: 13px;
        }

        tbody tr {
            animation: aparecer .4s ease both;
            transition: background .2s, opacity .25s, transform .25s;
        }

        tbody tr:hover {
            background: #6485ff0b;
        }

        tbody tr.saindo {
            opacity: 0;
            transform: translateX(25px);
        }

        .identidade {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 160px;
        }

        .avatar {
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border: 1px solid #8ba0ff30;
            border-radius: 12px;
            color: #b5c3ff;
            background: linear-gradient(135deg, #6687ff2b, #8870ff13);
            font-weight: bold;
            text-transform: uppercase;
        }

        .nome {
            margin-bottom: 5px;
            color: white;
            font-weight: bold;
        }

        .identificador {
            color: #7585a2;
            font-size: 11px;
        }

        .email {
            color: #aebbd3;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
            border: 1px solid #56d9a01d;
            border-radius: 50px;
            color: #8cf0bd;
            background: #56d9a00d;
            font-size: 11px;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #79f2bc;
        }

        .acoes {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .botao-acao {
            padding: 9px 12px;
            border: 1px solid #ffffff17;
            border-radius: 8px;
            color: #dce5ff;
            background: #ffffff08;
            font-size: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .botao-acao:hover {
            transform: translateY(-2px);
        }

        .botao-editar:hover {
            border-color: #6485ff70;
            color: #a9bbff;
            background: #6485ff12;
        }

        .botao-excluir:hover {
            border-color: #fb718550;
            color: #fda4af;
            background: #fb718510;
        }

        .vazio {
            padding: 55px 20px;
            text-align: center;
        }

        .vazio-icone {
            display: grid;
            place-items: center;
            width: 60px;
            height: 60px;
            margin: 0 auto 18px;
            border: 1px solid #8295ff25;
            border-radius: 18px;
            color: #9aafff;
            background: #6485ff12;
            font-size: 25px;
        }

        .vazio h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .vazio p {
            margin-bottom: 20px;
            color: var(--fraco);
            font-size: 13px;
            line-height: 1.7;
        }

        .sem-resultado {
            display: none;
        }

        .rodape-tabela {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            padding: 17px 24px;
            border-top: 1px solid #ffffff12;
            color: #8494b2;
            font-size: 11px;
        }

        footer {
            padding: 25px 0;
            color: #687792;
            text-align: center;
            font-size: 12px;
        }

        .fundo-modal {
            position: fixed;
            inset: 0;
            z-index: 20;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #050916c9;
            backdrop-filter: blur(8px);
            opacity: 0;
            visibility: hidden;
            transition: opacity .25s, visibility .25s;
        }

        .fundo-modal.aberto {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            width: 100%;
            max-width: 440px;
            padding: 29px;
            border: 1px solid #ffffff1b;
            border-radius: 19px;
            background: linear-gradient(145deg, #192642, #101729);
            box-shadow: 0 30px 100px #00000060;
            transform: translateY(20px) scale(.96);
            transition: transform .25s ease;
        }

        .fundo-modal.aberto .modal {
            transform: translateY(0) scale(1);
        }

        .modal-icone {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            margin-bottom: 19px;
            border: 1px solid #8295ff30;
            border-radius: 14px;
            color: #a8b8ff;
            background: #6485ff15;
            font-size: 22px;
        }

        .modal-icone.perigo {
            border-color: #fb718530;
            color: #fda4af;
            background: #fb718512;
        }

        .modal h2 {
            margin-bottom: 9px;
            font-size: 22px;
        }

        .modal-descricao {
            margin-bottom: 23px;
            color: var(--fraco);
            font-size: 13px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .campo {
            margin-bottom: 18px;
        }

        .campo label {
            display: block;
            margin-bottom: 9px;
            color: #dbe4f7;
            font-size: 12px;
            font-weight: bold;
        }

        .campo input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ffffff19;
            border-radius: 9px;
            outline: none;
            color: white;
            background: #080f20a8;
            font-size: 14px;
            transition: .2s;
        }

        .campo input:focus {
            border-color: #7890ff;
            box-shadow: 0 0 0 4px #6485ff18;
        }

        .botoes-modal {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        .cancelar {
            background: #ffffff0a;
        }

        .confirmar-exclusao {
            border-color: #fb718530;
            color: #fecdd3;
            background: #e11d481c;
        }

        .notificacoes {
            position: fixed;
            z-index: 40;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .notificacao {
            display: flex;
            align-items: center;
            gap: 12px;
            max-width: min(380px, calc(100vw - 40px));
            padding: 15px 18px;
            border: 1px solid #56d9a030;
            border-radius: 12px;
            color: #e3f9ee;
            background: #122b29f5;
            box-shadow: 0 15px 40px #00000040;
            animation: notificar .3s ease both;
            font-size: 13px;
            line-height: 1.5;
        }

        .notificacao.erro {
            border-color: #fb718540;
            background: #321923f5;
            color: #fecdd3;
        }

        .notificacao.saindo {
            animation: sairNotificacao .25s ease both;
        }

        @keyframes subir {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes descer {
            from { opacity: 0; transform: translateY(-14px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes aparecer {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes flutuar {
            from { transform: translate(0, 0); }
            to { transform: translate(-35px, 40px); }
        }

        @keyframes pulsar {
            50% { opacity: .45; }
        }

        @keyframes notificar {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes sairNotificacao {
            to { opacity: 0; transform: translateX(20px); }
        }

        @media (max-width: 760px) {
            .estatisticas {
                grid-template-columns: 1fr;
            }

            .estatistica {
                padding: 17px;
            }

            .cabecalho {
                align-items: flex-start;
                flex-direction: column;
            }

            .cartao-topo {
                align-items: stretch;
                flex-direction: column;
            }

            .busca {
                width: 100%;
            }
        }

        @media (max-width: 500px) {
            .pagina {
                width: calc(100% - 28px);
            }

            nav {
                min-height: 76px;
            }

            .marca {
                font-size: 18px;
            }

            .logo {
                width: 37px;
                height: 37px;
            }

            .link {
                padding: 10px;
                font-size: 11px;
            }

            h1 {
                letter-spacing: -1.5px;
            }

            .cartao-topo, .rodape-tabela {
                padding: 18px;
            }

            th, td {
                padding: 14px;
            }

            .botoes-modal {
                flex-direction: column;
            }

            .botoes-modal .link {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>
<body>

<div class="luz luz-1"></div>
<div class="luz luz-2"></div>

<div class="pagina">
    <nav>
        <a href="<?= site_url('/') ?>" class="marca">
            <span class="logo">U</span>
            <span>User<span class="marca-destaque">Flow</span></span>
        </a>

        <a href="<?= site_url('/') ?>" class="link">
            <span>←</span> Voltar ao início
        </a>
    </nav>

    <main class="conteudo">
        <header class="cabecalho">
            <div>
                <div class="etiqueta">
                    <span class="ponto"></span>
                    Painel de gerenciamento
                </div>

                <h1>Seus usuários, <span>organizados.</span></h1>

                <p class="descricao">
                    Visualize, edite e gerencie todos os usuários cadastrados.
                </p>
            </div>

            <a href="<?= site_url('/') ?>" class="botao-principal">
                <span>＋</span> Cadastrar usuário
            </a>
        </header>

        <section class="estatisticas">
            <article class="estatistica">
                <p class="estatistica-titulo">Total de usuários</p>
                <div class="estatistica-valor"><?= count($usuarios) ?></div>
                <p class="estatistica-legenda">Registros salvos no sistema</p>
            </article>

            <article class="estatistica">
                <p class="estatistica-titulo">Cadastros disponíveis</p>
                <div class="estatistica-valor"><?= count($usuarios) ?></div>
                <p class="estatistica-legenda">Usuários na sua lista</p>
            </article>

            <article class="estatistica">
                <p class="estatistica-titulo">Sistema</p>
                <div class="estatistica-valor" style="font-size: 23px;">Online</div>
                <p class="estatistica-legenda">Painel de gerenciamento</p>
            </article>
        </section>

        <section class="cartao">
            <header class="cartao-topo">
                <div>
                    <h2>Lista de usuários</h2>
                    <p>Consulte os dados e escolha uma ação.</p>
                </div>

                <input
                    type="search"
                    id="busca"
                    class="busca"
                    placeholder="⌕  Buscar por nome ou e-mail..."
                    aria-label="Buscar usuários"
                >
            </header>

            <div class="tabela-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody id="listaUsuarios">
                        <?php if (empty($usuarios)): ?>
                            <tr>
                                <td colspan="4">
                                    <div class="vazio">
                                        <div class="vazio-icone">♙</div>
                                        <h3>Nenhum usuário por aqui</h3>
                                        <p>
                                            Sua lista ainda está vazia.<br>
                                            Cadastre seu primeiro usuário para começar.
                                        </p>
                                        <a href="<?= site_url('/') ?>" class="botao-principal">
                                            ＋ Cadastrar primeiro usuário
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr
                                    data-linha
                                    data-nome="<?= esc($usuario['nome'], 'attr') ?>"
                                    data-email="<?= esc($usuario['email'], 'attr') ?>"
                                >
                                    <td>
                                        <div class="identidade">
                                            <div class="avatar">
                                                <?= esc(function_exists('mb_substr') ? mb_substr($usuario['nome'], 0, 1) : substr($usuario['nome'], 0, 1)) ?>
                                            </div>

                                            <div>
                                                <div class="nome"><?= esc($usuario['nome']) ?></div>
                                                <div class="identificador">ID: <?= esc($usuario['id']) ?></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="email"><?= esc($usuario['email']) ?></td>

                                    <td><span class="status">Cadastrado</span></td>

                                    <td>
                                        <div class="acoes">
                                            <button
                                                type="button"
                                                class="botao-acao botao-editar"
                                                data-editar
                                                data-id="<?= esc($usuario['id'], 'attr') ?>"
                                                data-nome="<?= esc($usuario['nome'], 'attr') ?>"
                                                data-email="<?= esc($usuario['email'], 'attr') ?>"
                                            >Editar</button>

                                            <button
                                                type="button"
                                                class="botao-acao botao-excluir"
                                                data-excluir
                                                data-id="<?= esc($usuario['id'], 'attr') ?>"
                                                data-nome="<?= esc($usuario['nome'], 'attr') ?>"
                                            >Excluir</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <tr id="semResultado" class="sem-resultado">
                                <td colspan="4">
                                    <div class="vazio">
                                        <h3>Nenhum resultado encontrado</h3>
                                        <p>Tente pesquisar por outro nome ou e-mail.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <footer class="rodape-tabela">
                <span id="contador">
                    <?= count($usuarios) ?> usuário(s) cadastrado(s)
                </span>
                <span>Gerenciamento UserFlow</span>
            </footer>
        </section>
    </main>

    <footer>
        UserFlow · Sistema de gerenciamento de usuários
    </footer>
</div>

<div class="fundo-modal" id="modalEditar">
    <section class="modal" role="dialog" aria-modal="true" aria-labelledby="tituloEditar">
        <div class="modal-icone">✎</div>
        <h2 id="tituloEditar">Editar usuário</h2>
        <p class="modal-descricao">Atualize as informações do usuário.</p>

        <form id="formEditar" method="post">
            <?= csrf_field() ?>

            <div class="campo">
                <label for="nomeEditar">Nome completo</label>
                <input type="text" id="nomeEditar" name="nome" required>
            </div>

            <div class="campo">
                <label for="emailEditar">E-mail</label>
                <input type="email" id="emailEditar" name="email" required>
            </div>

            <div class="botoes-modal">
                <button type="button" class="link cancelar" data-fechar>Cancelar</button>
                <button type="submit" class="botao-principal">Salvar alterações →</button>
            </div>
        </form>
    </section>
</div>

<div class="fundo-modal" id="modalExcluir">
    <section class="modal" role="dialog" aria-modal="true" aria-labelledby="tituloExcluir">
        <div class="modal-icone perigo">!</div>
        <h2 id="tituloExcluir">Excluir usuário?</h2>
        <p class="modal-descricao" id="textoExcluir">
            Esta ação não pode ser desfeita.
        </p>

        <form id="formExcluir" method="post">
            <?= csrf_field() ?>

            <div class="botoes-modal">
                <button type="button" class="link cancelar" data-fechar>Cancelar</button>
                <button type="submit" class="link confirmar-exclusao">Sim, excluir</button>
            </div>
        </form>
    </section>
</div>

<div class="notificacoes" id="notificacoes" aria-live="polite"></div>

<script>
    const modalEditar = document.getElementById('modalEditar');
    const modalExcluir = document.getElementById('modalExcluir');
    const formEditar = document.getElementById('formEditar');
    const formExcluir = document.getElementById('formExcluir');
    const busca = document.getElementById('busca');
    const linhas = [...document.querySelectorAll('[data-linha]')];
    const semResultado = document.getElementById('semResultado');

    function abrirModal(modal) {
        modal.classList.add('aberto');
        document.body.style.overflow = 'hidden';

        const campo = modal.querySelector('input');

        if (campo) {
            setTimeout(() => campo.focus(), 150);
        }
    }

    function fecharModal(modal) {
        modal.classList.remove('aberto');

        if (!document.querySelector('.fundo-modal.aberto')) {
            document.body.style.overflow = '';
        }
    }

    document.querySelectorAll('[data-editar]').forEach(botao => {
        botao.addEventListener('click', () => {
            const id = botao.dataset.id;

            document.getElementById('nomeEditar').value = botao.dataset.nome;
            document.getElementById('emailEditar').value = botao.dataset.email;

            formEditar.action =
                '<?= site_url('usuarios/editar') ?>/' + encodeURIComponent(id);

            abrirModal(modalEditar);
        });
    });

    document.querySelectorAll('[data-excluir]').forEach(botao => {
        botao.addEventListener('click', () => {
            const id = botao.dataset.id;

            document.getElementById('textoExcluir').textContent =
                'Tem certeza de que deseja excluir "' + botao.dataset.nome +
                '"? Essa ação não poderá ser desfeita.';

            formExcluir.action =
                '<?= site_url('usuarios/excluir') ?>/' + encodeURIComponent(id);

            abrirModal(modalExcluir);
        });
    });

    document.querySelectorAll('[data-fechar]').forEach(botao => {
        botao.addEventListener('click', () => {
            fecharModal(botao.closest('.fundo-modal'));
        });
    });

    document.querySelectorAll('.fundo-modal').forEach(modal => {
        modal.addEventListener('click', evento => {
            if (evento.target === modal) {
                fecharModal(modal);
            }
        });
    });

    document.addEventListener('keydown', evento => {
        if (evento.key === 'Escape') {
            document.querySelectorAll('.fundo-modal.aberto')
                .forEach(fecharModal);
        }
    });

    busca.addEventListener('input', () => {
        const termo = busca.value.trim().toLocaleLowerCase('pt-BR');
        let encontrados = 0;

        linhas.forEach(linha => {
            const nome = linha.dataset.nome.toLocaleLowerCase('pt-BR');
            const email = linha.dataset.email.toLocaleLowerCase('pt-BR');
            const corresponde = nome.includes(termo) || email.includes(termo);

            linha.style.display = corresponde ? '' : 'none';

            if (corresponde) {
                encontrados++;
            }
        });

        if (semResultado) {
            semResultado.style.display =
                encontrados === 0 && linhas.length > 0 ? 'table-row' : 'none';
        }

        document.getElementById('contador').textContent =
            encontrados + (encontrados === 1 ? ' usuário encontrado' : ' usuários encontrados');
    });

    function notificar(mensagem, erro = false) {
        const elemento = document.createElement('div');
        elemento.className = 'notificacao' + (erro ? ' erro' : '');
        elemento.textContent = mensagem;

        document.getElementById('notificacoes').appendChild(elemento);

        setTimeout(() => {
            elemento.classList.add('saindo');
            setTimeout(() => elemento.remove(), 250);
        }, 3500);
    }

    <?php if (session()->getFlashdata('sucesso')): ?>
        notificar(<?= json_encode(session()->getFlashdata('sucesso'), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>);
    <?php endif; ?>

    <?php if (session()->getFlashdata('erro')): ?>
        notificar(<?= json_encode(session()->getFlashdata('erro'), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>, true);
    <?php endif; ?>
</script>

</body>
</html>