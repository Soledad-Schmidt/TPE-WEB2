{include file='templates/header.tpl'}
<h2>{$titulo}</h2>


    <form action="updatebrand" method="POST">
        <label>Nombre</label>
        <input type="text" name="name" required>

        <input type="text" name="id_brand" value="{$id_brand}" hidden>

        <button type="submit" class="btn_form">Guardar</button>
    </form>


{include file='templates/footer.tpl'}