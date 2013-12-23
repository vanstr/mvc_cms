{loop="newsArticles"}
<div class="row feature">

    <h3><a href="?page=news&id={$value.id}">{$value.topic}</a></h3>
    {if="$admin"} <a href="?page=news&id={$value.id}&action=deletenews">deletenews</a> {else} {/if}

    <p>{$value.text}</p>

</div>
{/loop}