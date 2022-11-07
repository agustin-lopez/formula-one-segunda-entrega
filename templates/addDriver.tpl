{include file="header.tpl"}

<div class="container">

    <form class="form-edit" action="adddriverdatabase" method="POST" enctype="multipart/form-data">

        <h2>ADD NEW DRIVER</h2>

        <div class="form-group">
            <label for="driverName">Name</label>
            <input type="text" name="driverName" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="team">Team</label> <br>
            <select name="team" required>
                {foreach from=$allTeams item=$team}
                    <option value="{$team->id}">{$team->id} | {$team->teamName}</option>
                {/foreach}
            </select>
            <a href="addteam">[add new team]</a>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="victories">Victories</label>
            <input type="number" name="victories" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="podiums">Podiums</label>
            <input type="number" name="podiums" class="form-control" required>
        </div>   
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>  

        <input type="submit" class="btn btn-danger" value="ADD">
        <a href="drivers" class="btn btn-danger">CANCEL</a>
    </form>
    
</div>

{include file="footer.tpl"}