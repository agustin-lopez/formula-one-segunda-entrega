{include file="header.tpl"}

<div class="container">

    <form class="form-edit" action="updateteam" method="POST" enctype="multipart/form-data">

        <h2>TEAM EDIT: ({$teamData->id}) | {$teamData->teamName}</h2>

        {* SI NO EXISTE UN PILOTO PARA ESTA ESCUDERÍA, MUESTRA "EMPTY SLOT" *}
        <div class="form-group">
            {if isset($driversData[0])}
                <p>Driver 1: {$driversData[0]->driverName}</p> <a href="editdriver/{$driversData[0]->id}">[edit]<a>
            {else}
                <p>Driver 1: EMPTY SLOT</p>
            {/if}
        </div>
        
        <div class="form-group">
            {if isset($driversData[1])}
                <p>Driver 1: {$driversData[1]->driverName}</p> <a href="editdriver/{$driversData[1]->id}">[edit]<a>
            {else}
                <p>Driver 1: EMPTY SLOT</p>
            {/if}
        </div>

        <div class="form-group hidden">
            <input type="number" name="id" class="form-control" value="{$teamData->id}">
        </div>

        <div class="form-group">
            <label for="teamName">Name</label>
            <input type="text" name="teamName" class="form-control" value="{$teamData->teamName}">
        </div>

        <div class="form-group">
            <label for="teamNationality">Nationality</label>
            <input type="text" name="teamNationality" class="form-control" value="{$teamData->teamNationality}">
        </div>

        <div class="form-group">
            <label for="totalVictories">Total victories</label>
            <input type="text" name="totalVictories" class="form-control" value="{$teamData->totalVictories}">
        </div>

        <div class="form-group">
            <label for="totalPodiums">Total podiums</label>
            <input type="text" name="totalPodiums" class="form-control" value="{$teamData->totalPodiums}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            {if ($teamData->image)}
                <div class="image-container">
                    <div>
                        <p>IMAGE URL: {$teamData->image}</p>
                    </div>
                    <br>
                    <div>
                        <img src="{$teamData->image}" alt="TEAM IMAGE" class="image-preview" draggable="false">
                    </div>
                </div>
            {else}
                <p>NO IMAGE</p>
            {/if}
        </div>

        <input type="submit" class="btn btn-danger" value="UPDATE">
        <a href="teams" class="btn btn-danger">CANCEL</a>

    </form>
    
</div>

{include file="footer.tpl"}