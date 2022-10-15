{include file='templates/header.tpl'}
<h2>{$titulo}</h2>


    <form action="addbrand" method="POST">
        <label>Nombre</label>
        <input type="text" name="name" required>

        <button type="submit" class="btn_form">Guardar</button>
    </form>


{include file='templates/footer.tpl'}