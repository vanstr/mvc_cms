
<div id="portfolio">
    <div class="container">
        <div class="section_header">
            <h3>{$portfolioHeader}</h3>
        </div>
        <div class="row">
            <div class="span12">
                <div id="filters_container">
                    <ul id="filters">

                        <li class="separator">/</li>
                        <li><a href="#" data-filter="*" class="active">All</a></li>
                        <li class="separator">/</li>

                        {loop="portfolioTypes"}
                            <li><a href="#" data-filter=".{$value.type}">{$value.type}</a></li>
                            <li class="separator">/</li>
                        {/loop}

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div id="gallery_container">


                    {loop="portfolioItems"}
                        <div class="photo {$value.type}">
                            <img src="{$dirSRC}img/{$value.image}" />
                            <a href="?page=portfolio&id={$value.id}" class="mask">
                                <h3>{$value.header}</h3>
                                <small>{$value.type}</small>
                                <div class="more">+</div>
                            </a>
                        </div>
                    {/loop}


                </div>
            </div>
        </div>
    </div>
</div>

