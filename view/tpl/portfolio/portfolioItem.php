
<div id="portfolio_tem">
    <div class="container">
        <div class="section_header">
            <h3>{$portfolioHeader}</h3>
        </div>

        <div class="span7 left_box">
            <div class="big">
                <img width="400" src="{$dirSRC}img/{$portfolioItem.image}" />

            </div>
            <!--
            <div class="thumbs">
                <div class="thumb">
                    <img src="{$dirSRC}img/{$portfolioItem.image}" />
                    <a href="#" class="mask">
                        <div class="more">+</div>
                    </a>
                </div>
                <div class="thumb">
                    <img src="{$dirSRC}img/{$portfolioItem.image}" />
                    <a href="#" class="mask">
                        <div class="more">+</div>
                    </a>
                </div>
                <div class="thumb">
                    <img src="{$dirSRC}img/folio_thumb1.png" />
                    <a href="#" class="mask">
                        <div class="more">+</div>
                    </a>
                </div>
                <div class="thumb last">
                    <img src="{$dirSRC}img/folio_thumb2.png" />
                    <a href="#" class="mask">
                        <div class="more">+</div>
                    </a>
                </div>
            </div>
            -->
        </div>

        <div class="span5 right_box">
            <h2>{$portfolioItem.header}</h2>
            {$portfolioItem.text}
        </div>
    </div>
</div>