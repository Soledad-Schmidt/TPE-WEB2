{include file='templates/header.tpl'}
<h2>{$titulo}</h2>

    <form method="POST" action="verify">
        <label>Nombre de Usuario</label>
        <input type="text" name="name" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        {if $error}
            <div class="alert">
                {$error}
            </div>
        {/if}

        <button type="submit" class="btn_form">Aceptar</button>
    </form>


{include file='templates/footer.tpl'}





    