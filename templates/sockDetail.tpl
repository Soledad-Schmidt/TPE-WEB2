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
            <th>Oferta</th>
        </tr>
       
        <tr>
            <td>{$sock->model}</td>
            <td>{$sock->color}</td>
            <td>{$sock->size}</td>
            <td>{$sock->price}</td>
            <td><a href="socksbybrand/{$sock->name}">{$sock->name}</a></td>
            <td>{$sock->sale}</td>
        </tr> 
        
    </table>
</div>


{include file='templates/footer.tpl'}