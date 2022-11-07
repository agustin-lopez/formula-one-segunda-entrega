{include file="header.tpl"}

<div class="main-data-container container">

    <h1><span>{$teamData->teamName}</span> information</h1>

    <div class="info-container">

        <div class="info">

            <p><strong>Team ID: </strong> {$teamData->id}</p>
            <p><strong>Name: </strong> {$teamData->teamName}</p>
            <p><strong>Nationality: </strong> {$teamData->teamNationality}</p>
            {if isset($driversData[0])}
                <td><strong>Driver one: </strong><a href="drivers/{$driversData[0]->id}">{$driversData[0]->driverName}</a></td> <br>
            {else}
                <td><strong>Driver one: </strong> EMPTY SLOT</td> <br>
            {/if}

            {if isset($driversData[1])} 
                <td><strong>Driver two: </strong><a href="drivers/{$driversData[1]->id}">{$driversData[1]->driverName}</a></td> <br>
            {else}
                <td><strong>Driver two: </strong>EMPTY SLOT</td> <br>
            {/if}
            <p><strong>Total victories: </strong> {$teamData->totalVictories}</p>
            <p><strong>Total podiums: </strong> {$teamData->totalPodiums}</p>

        </div>
        
        {if ($teamData->image)}
            <div class="image-container">
                <img src="{$teamData->image}" alt="TEAM IMAGE" class="team-image" draggable="false">
            </div>
        {else}
            <div class="image-container">
                <p>NO IMAGE</p>
            </div>
        {/if}

    </div>

    <a href="teams" class="btn btn-danger"><- back to teams</a>

</div>

{* <div class='container'>

    <h1><span>{$teamData->teamName}</span> information</h1> <br>

    <table class='table'>
        <tr>
            <th>Team ID</th>
            <th>Team name</th>
            <th>Nationality</th>
            <th>Driver 1</th>
            <th>Driver 2</th>
            <th>Total victories</th>
            <th>Total podiums</th>
        </tr>

        <tr>
            <td>{$teamData->id}</td>
            <td>{$teamData->teamName}</td>
            <td>{$teamData->teamNationality}</td>

            {if isset($driversData[0])}
                <td><a href="drivers/{$driversData[0]->id}">{$driversData[0]->driverName}</a></td>
            {else}
                <td>EMPTY SLOT</td>
            {/if}

            {if isset($driversData[1])} 
                <td><a href="drivers/{$driversData[1]->id}">{$driversData[1]->driverName}</a></td>
            {else}
                <td>EMPTY SLOT</td>
            {/if}

            <td>{$teamData->totalVictories}</td>
            <td>{$teamData->totalPodiums}</td>
        </tr>
    </table>

    {if ($teamData->image)}
        <div class="image-container">
            <img src="{$teamData->image}" alt="TEAM IMAGE" class="image" draggable="false">
        </div>
    {else}
        <div class="image-container">
            <p>NO IMAGE</p>
        </div>
    {/if}
    

    <a href="teams" class="btn btn-danger"><- back to teams</a>

</div> *}

{include file="footer.tpl"}
