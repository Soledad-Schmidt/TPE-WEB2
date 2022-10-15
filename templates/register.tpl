{include file='templates/header.tpl'}
<h2>{$titulo}</h2>


        <form method="POST" action="usercreate">
            <label>Nombre de Usuario</label>
            <input type="text" name="name" required>

            <label>Contraseña</label>
            <input type="text" name="password" required >

            <button type="submit" class="btn_form">Crear Cuenta</button>
        </form>

{include file='templates/footer.tpl'}



