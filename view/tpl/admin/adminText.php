
{loop="texts"}
<div class="row">

    <div class="underline">
    <b>ID: {$value.id}</b>
    <b>NAME: {$value.name}</b>
    </div>
    <div class="edit" id="{$value.id}">{$value.text}</div>

</div>
{/loop}
