{include file="header.tpl"}

<div class="main-data-container container">

    <h1><span>{$driverData->driverName}</span> information</h1>

    <div class="info-container">

        <div class="info">

            <p><strong>Driver ID: </strong> {$driverData->id}</p>
            <p><strong>Name: </strong> {$driverData->driverName}</p>
            <p><strong>Nationality: </strong> {$driverData->nationality}</p>
            <p><strong>Age:</strong> {$driverData->age}</p>
            <p><strong>Victories: </strong> {$driverData->victories}</p>
            <p><strong>Podiums: </strong> {$driverData->podiums}</p>
            <p><strong>Running for :</strong> <a href="teams/{$team->id}">{$team->teamName}</a></p>

        </div>

        {if ($driverData->image)}
            <div class="image-container">
                <img src="{$driverData->image}" alt="DRIVER IMAGE" class="driver-image" draggable="false">
            </div>
        {else}
            <div class="image-container">
                <p>NO IMAGE</p>
            </div>
        {/if}        

    </div>

    <a href="drivers" class="btn btn-danger"><- back to drivers</a>

</div>

{* <div class='container'>

    <h1><span>{$driverData->driverName}</span> information</h1> <br>

    <table class='table'>
        <tr>
            <th>Driver ID</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Age</th>
            <th>Running for</th>
            <th>Victories</th>
            <th>Podiums</th>
        </tr>

        <tr>
            <td>{$driverData->id}</td>
            <td>{$driverData->driverName}</td>
            <td>{$driverData->nationality}</td>
            <td>{$driverData->age}</td>
            <td><a href="teams/{$team->id}">{$team->teamName}</a></td>
            <td>{$driverData->victories}</td>
            <td>{$driverData->podiums}</td>
        </tr>
    </table>

    {if ($driverData->image)}
        <div class="image-container">
            <img src="{$driverData->image}" alt="DRIVER IMAGE" class="image" draggable="false">
        </div>
    {else}
        <div class="image-container">
            <p>NO IMAGE</p>
        </div>
    {/if}

    <a href="drivers" class="btn btn-danger"><- back to drivers</a>

</div> *}

{include file="footer.tpl"}
