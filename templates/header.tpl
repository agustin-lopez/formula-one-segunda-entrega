<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- URL BASE -->
        <base href='{BASE_URL}'>

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="icon" href="./images/icon.png">

        <title>Formula One Info+</title>
        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home"><strong>F1 HOME</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="teams">Teams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="drivers">Drivers</a>
                            </li>

                            {if !isset($smarty.session.USER_NAME)} {* SI NO HAY SESIÓN MUESTRA EL BOTÓN DE LOGIN *}

                                <li class="nav-item">
                                    <a class="nav-link" href="login">Log in</a>
                                </li>

                            {else} {* SI HAY SESIÓN MUESTRA EL BOTÓN DE LOGOUT *}

                                <li class="nav-item">
                                    <a class="nav-link" href="logout">Log out [{$smarty.session.USER_NAME}]</a>
                                </li>

                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>