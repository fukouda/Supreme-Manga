<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/index">Supreme Manga(Alpha)</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Read Manga <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/pages/manga-list">Manga List</a></li>
                    <li><a href="#">Popular Manga</a></li>
                    <li><a href="#">Recent Updates</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Watch Anime</a></li>
                    <li class="divider"></li>                    
                </ul>
            </li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="col-sm-3 col-md-3 pull-right">
            <form class="navbar-form" role="search" action="/pages/search" method="get" target="_top">
                <div class="input-group">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="q" value="<?php echo $_GET['q']?>">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</nav>