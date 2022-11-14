{include file='templates/header.tpl'}
<h2>{$titulo}</h2>


    <form action="addsock" method="POST">

        <label>Modelo</label>
        <input type="text" name="model" required>

        <label>Color</label>
        <input type="text" name="color" required>

        <label>Talle</label>
        <select name="size" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>

        <label>Precio</label>
        <input type="text" name="price" required>

        <label>Marca</label>
        <select name="id_brand" required>
            {foreach from=$brand item=$item}
            <option value="{$item->id_brand}"> {$item->name} </option>
            {/foreach}
        </select>

        <label>Oferta</label>
        <select name="sale" required>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
            
        <button type="submit" class="btn_form">Guardar</button>
    </form>


{include file='templates/footer.tpl'}