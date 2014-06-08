
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('.edit').editable('?content=admin&part=text', {
            type      : 'textarea',
            indicator : 'Saving...',
            cancel    : 'Cancel',
            submit    : 'OK',
            tooltip   : 'refresh',
            id        : 'id',
            name      : 'newvalue',
            submitdata : {action: "edittext", silent: "true"}
        });
    });
</script>

{loop="texts"}
<div class="row">

    <div class="underline">
    <b>ID: {$value.id}</b>
    <b>NAME: {$value.name}</b>
    </div>
    <div class="edit" id="{$value.id}">{$value.text}</div>

</div>
{/loop}
