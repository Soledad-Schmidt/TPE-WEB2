{include file='templates/header.tpl'}
<h2>{$titulo}</h2>
<div class="table">
    <table>
        <tr>
            <th>Marca</th>
        </tr>
        {foreach from=$brands item=$i}
            <tr>
                <td><a href="socksbybrand/{$i->name}">{$i->name}</a></td>
                    {if isset($smarty.session.USER_ID)}
                    <td><button><a href="deletebrand/{$i->id_brand}">Borrar</a></button></td>
                    <td><button><a href="editbrand/{$i->id_brand}">Editar</a></button></td>
                    {/if}
            <tr> 
        {/foreach}
    </table>
</div>

{include file='templates/footer.tpl'}