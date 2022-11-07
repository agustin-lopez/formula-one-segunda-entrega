{include file="header.tpl"}

<div class="container">

    <form class="form-edit" action="updatedriver" method="POST" enctype="multipart/form-data">

        <h2>DRIVER EDIT: ({$driverData->id}) | {$driverData->driverName}</h2>

        <div class="form-group hidden">
            <input type="number" name="id" class="form-control" value="{$driverData->id}">
        </div>

        <div class="form-group">
            <label for="driverName">Name</label>
            <input type="text" name="driverName" class="form-control" value="{$driverData->driverName}">
        </div>

        <div class="form-group">
            <label for="team">Team</label> <br>
            <select name="team">
                {foreach from=$allTeams item=$team}
                    {if $driverData->teamID == $team->id}
                        <option value="{$team->id}" selected>{$team->teamName}</option>
                    {else}
                        <option value="{$team->id}">{$team->teamName}</option>
                    {/if}
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{$driverData->nationality}">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="{$driverData->age}">
        </div>

        <div class="form-group">
            <label for="victories">Victories</label>
            <input type="text" name="victories" class="form-control" value="{$driverData->victories}">
        </div>

        <div class="form-group">
            <label for="podiums">Podiums</label>
            <input type="text" name="podiums" class="form-control" value="{$driverData->podiums}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            {if ($driverData->image)}
                <div class="image-container">
                    <div>
                        <p>IMAGE URL: {$driverData->image}</p>
                    </div>
                    <br>
                    <div>
                        <img src="{$driverData->image}" alt="DRIVER IMAGE" class="image-preview" draggable="false">
                    </div>
                </div>
            {else}
                <p>NO IMAGE</p>
            {/if}
        </div>

        <input type="submit" class="btn btn-danger" value="UPDATE">
        <a href="drivers" class="btn btn-danger">CANCEL</a>
    </form>
    
</div>

{include file="footer.tpl"}