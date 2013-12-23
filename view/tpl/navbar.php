<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="?page=news">
                <strong>{$navbarTitle}</strong>
            </a>

            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php">{$pageHome}</a></li>
                    <li><a href="?page=aboutus">{$pageAboutus}</a></li>
                    <li><a href="?page=portfolio">{$pagePortfolio}</a></li>
                    <li><a href="?page=contact">{$pageContact}</a></li>
                    {if="$loggedOut"} <li><a href="?page=login">{$loginHeader}</a> </li>{else} <li><a href="?page=login&action=logout">{$loginLogout}</a> </li> {/if}
                    {if="$admin"} <li><a href="?page=admin">{$pageAdmin}</a> </li>{else} {/if}
                </ul>
            </div>
        </div>
    </div>
</div>