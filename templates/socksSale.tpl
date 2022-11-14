{include file='templates/header.tpl'}
<h2>{$titulo}</h2>
<div class="table">
    <table>    
        <tr>
            <th>Modelo</th>
            <th>Color</th>
            <th>Talle</th>
            <th>Precio</th>
            <th>Marca</th>
        </tr>
        {foreach from=$socks item=$i}
            <tr>
                <td><a href="detail/{$i->id_sock}">{$i->model}</a></td>
                <td>{$i->color}</td>
                <td>{$i->size}</td>
                <td>{$i->price}</td>
                <td><a href="socksbybrand/{$i->name}">{$i->name}</a></td> 
            </tr>
        {/foreach} 
    </table>
</div>


{include file='templates/footer.tpl'}