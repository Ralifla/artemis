<form class="widget" action="<?php bloginfo('url'); ?>/" method="get" accept-charset="utf-8" role="search">
	<div id="search">
		<label for="search">Procurar por: </label>
		<input type="search" name="s" value="<?php the_search_query(); ?>"  placeholder="digite aqui:" />
    	<button class="fa fa-search search" type="submit"></button>
	</div>
</form>