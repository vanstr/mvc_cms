<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="?content=news">
                <strong>{$navbarTitle}</strong>
            </a>

            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php">{$pageHome}</a></li>
                    <li><a href="?content=aboutus">{$pageAboutus}</a></li>
                    <li><a href="?content=portfolio">{$pagePortfolio}</a></li>
                    <li><a href="?content=contact">{$pageContact}</a></li>
                    {if="$loggedOut"} <li><a href="?content=login">{$loginHeader}</a> </li>{else} <li><a href="?content=login&action=logout">{$loginLogout}</a> </li> {/if}
                    {if="$admin"} <li><a href="?content=admin">{$pageAdmin}</a> </li>{else} {/if}
                </ul>
            </div>
        </div>
    </div>
</div>