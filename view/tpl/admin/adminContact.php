{loop="messages"}
<div class="row">

    <div class="underline">
        <b>ID: {$value.id}</b>
        <b>NAME: {$value.author}</b>
        <b>NAME: {$value.email}</b>
        <b>NAME: {$value.phone}</b>
    </div>
    <div class="edit" id="{$value.id}">{$value.message}</div>

</div>
{/loop}
