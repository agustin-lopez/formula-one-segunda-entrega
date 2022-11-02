{include 'header.tpl'}

<div class="login-container">

    <form method="POST" action="validate">
    
        <div>
            <p>EMAIL: user@admin.com</p> <br>
            <p>PASSWORD: useradmin</p>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required class="form-control" name="email" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" name="password">
        </div>

        {if $error} 
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}

        <div class="btn-container">
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </div>

    </form>

</div>

{include file='footer.tpl'}

