
<div class="comments">
    <h4>{$commentsHeader}</h4>

    {loop="comments"}
    <div class="comment">
        <div class="row">
            <div class="span1">
                <img src="{$dirSRC}img/user-display.png" class="img-circle author_pic">
            </div>
            <div class="span7">
                <div class="name">
                    {$value.author}
                    {if="$admin"} <a href="?page=news&id={$newsID}&action=deletecomment&comment_id={$value.id}">delete</a> {else} {/if}
                </div>
                <div class="date">
                    {$value.date}
                </div>
                <div class="response">
                    {$value.message}
                </div>
            </div>
        </div>
    </div>
    {/loop}

</div>

<div class="new_comment">
    <h4>{$commentAddNew}</h4>
    <form action="?page=news&id={$newsID}" method="POST">
        <input type="hidden" name="action" value="addcomment" />
        <input type="hidden" name="newsID" value="{$newsID}" />
        <div class="row">
            <div class="span4">
                <input name="author" type="text" placeholder="Name" name="name">
            </div>
            <div class="span4">
                <input name="email" type="text" placeholder="Email" name="email">
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <textarea name="message" placeholder="Comments" rows="7"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <input type="submit" value="add"/>
            </div>
        </div>
    </form>
</div>

