<div class="search-form">
	<form action="/" method="get">
	    <fieldset>
	        <label for="search"><i class="icon-search"></i><span>Search</span></label>
	        <input type="hidden" name="post_type" value="post" />
	        <input class="icon-search" type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>">
	    </fieldset>
	</form>
</div>