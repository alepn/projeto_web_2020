<div id="cols">
    <div class="col">
    <h1>Contato</h1>

    <p>Preencha o formulário de contato abaixo:</p>

    <div id="formulario">

        <form action="?pagina=processar_formulario" method="POST">
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome" />
        </div>
        <div>
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Digite seu telefone" />
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" />
        </div>
        <div>
            <label>Mensagem:</label>
            <textarea name="mensagem" placeholder="Digite sua mensagem..."></textarea>
        </div>
        <button type="submit">Enviar</button>
        </form>

    </div>
    </div>
</div>