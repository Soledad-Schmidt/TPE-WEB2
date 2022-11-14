<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Medias</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section class="body">
        <header>
                <div class="logo">
                    <nav class="user">
                        <li class="btn_user">
                        {if !isset($smarty.session.USER_ID)}
                                <a href="login">Ingresar</a>
                            {else}
                                <a href="logout">Logout</a>
                            {/if}
                        </li>
                        <li class="btn_user"><a href="register">Registrarse</a></li>         
                    </nav>

                    <h1>Sock's and Roll</h1>
                </div>    

        </header>

        <nav class="navigation">
            <li class="btn_nav"><a href="socks">Medias</a></li>
            <li class="btn_nav"><a href="brands">Marcas</a></li>
            <li class="btn_nav"><a href="sale">Ofertas</a></li>
            {if isset($smarty.session.USER_ID)}
                <li class="btn_nav"><a href="insertsock">Insertar Media</a></li>
                <li class="btn_nav"><a href="insertbrand">Insertar Marca</a></li>
            {/if}
        </nav>
    </section>


