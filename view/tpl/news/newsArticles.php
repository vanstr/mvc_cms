{loop="newsArticles"}
<div class="row feature">

    <h3><a href="?content=news&id={$value.id}">{$value.topic}</a></h3>
    {if="$admin"} <a href="?content=news&id={$value.id}&action=deletenews">deletenews</a> {else} {/if}

    <p>{$value.text}</p>

</div>
{/loop}