{include file='templates/header.tpl'}
<h2>{$titulo}</h2>
<div class="table">
    <table>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
        </tr>
        {foreach from=$socksByBrand item=$i}
        <tr>
            <td>{$i->name}</td>
            <td>{$i->model}</td>
        </tr> 
        {/foreach}
    </table>
</div>

{include file='templates/footer.tpl'}