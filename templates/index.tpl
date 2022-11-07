{include 'header.tpl'}

<div class="container home">

    <div>
        <div class="home-container">
            <h1>Welcome to <strong>Formula One Info+</strong></h1>
            <p class="home-p">Here you will find some basic information about Formula One <a href="teams">teams</a> and <a href="drivers">drivers</a></p>

            <div class="img-container">
                <img src="./images/silhouette.png" alt="F1 CAR" draggable="false" class="team-image">
            </div>
        <div>

        {if ($error)}
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}

    </div> 

</div>

{include file='footer.tpl'}