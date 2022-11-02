{include file="header.tpl"}

<div class="container">

    {if isset($smarty.session.IS_LOGGED)}
        <div class="add">
            <a href="addteam" class="btn btn-danger">Add new team</a>
        </div>
    {/if}

    {if $error} 
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if} 

    <div class="list-group">
        {foreach from=$allTeams item=$team}
            <div class="list-group-item list-group-item-action">
                <a href= "teams/{$team->id}" >{$team->id} | {$team->teamName} </a>

                {if isset($smarty.session.IS_LOGGED)}
                <div>
                    <a href= "editteam/{$team->id}">EDIT</a> |
                    <a href= "deleteteam/{$team->id}">DELETE</a>
                </div>
                {/if}
            </div>
        {/foreach}
    </div>

</div>

{include file="footer.tpl"}
