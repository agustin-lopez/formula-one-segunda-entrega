{include file="header.tpl"}

<div class="container">

    {if isset($smarty.session.IS_LOGGED)}
        <div class="add">
            <a href="adddriver" class="btn btn-danger">Add new driver</a>
        </div>
    {/if}

    {if $error} 
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if}

    <div class="list-group">
        {foreach from=$allDrivers item=$driver}
            <div class="list-group-item list-group-item-action">
                <a href= "drivers/{$driver->id}" >{$driver->id} | {$driver->driverName} </a>

                {if isset($smarty.session.IS_LOGGED)}
                    <div>
                        <a href= "editdriver/{$driver->id}">EDIT</a> |
                        <a href= "deletedriver/{$driver->id}">DELETE</a>
                    </div>
                {/if}
            </div>
        {/foreach}
    </div>
</div>

{include file="footer.tpl"}
