{include file="header.tpl"}

<div class="container">

    <form class="form-edit" action="addteamdatabase" method="POST" enctype="multipart/form-data">

        <h2>ADD NEW TEAM</h2>

        <div class="form-group">
            <label for="teamName">Name</label>
            <input type="text" name="teamName" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="totalVictories">Total victories</label>
            <input type="number" name="totalVictories" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="totalPodiums">Total podiums</label>
            <input type="number" name="totalPodiums" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>      

        <input type="submit" class="btn btn-danger" value="ADD">
        <a href="teams" class="btn btn-danger">CANCEL</a>
    </form>
    
</div>

{include file="footer.tpl"}