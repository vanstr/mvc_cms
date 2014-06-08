<div id="contact">
    <div class="container">
        <div class="section_header">
            <h3>{$contactHeader}</h3>
        </div>
        <div class="row contact">
            {$contactMarketingText}

            <form name="" action="?content=contact" method="POST" />
                <input type="hidden" name="action" value="sendmessage" />
                <div class="row form">
                    <div class="span6 box">
                        <input name="author" class="name    " type="text" placeholder="Name"/>
                        <input name="email" class="mail" type="text" placeholder="Email"/>
                        <input name="phone" class="phone" type="text" placeholder="Phone"/>
                    </div>
                    <div class="span6 box box_r">
                        <textarea name="message" placeholder="Type a message here..."></textarea>
                    </div>
                </div>

                <div class="row submit">
                    <div class="span3 right">
                        <input type="submit" value="Send your message"/>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row map">
        <div class="container">
            <div class="span5 box_wrapp">
                <div class="box_cont">
                    {$contactInfo}
                </div>
            </div>
        </div>
        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com.mx/?ie=UTF8&amp;ll=64.089157,-21.816616&amp;spn=0.045157,0.15398&amp;t=m&amp;z=13&amp;output=embed"></iframe>
    </div>
</div>
