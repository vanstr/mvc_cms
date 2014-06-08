<div id="features">

    <div class="container">

        <div class="section_header">
            <h3>{$newsHeader}</h3>
        </div>

        {$news}
        {if="$admin"} <a href="?content=news&action=addnews">add news</a> {else} {/if}

    </div>
</div>