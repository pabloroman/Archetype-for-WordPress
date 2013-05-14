<?php global $post; ?>

		<footer id="page-bottom">
			<div class="wrapper">
				<div class="row blog-credits">
					<p class="text-center nomargin">Archetype es un tema de <a href="http://wordpress.org/">WordPress</a> creado por <a href="http://pabloroman.es/">Pablo Román</a>. El tema está basado en el framework <a href="http://pabloroman.es/archetype/">HTML5 Archetype</a> y se publica bajo licencia <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.</p>
					<p class="text-center">Las fotografías empleadas para ilustrar este sitio de ejemplo en este sitio han sido realizadas por <a href="http://www.rafaquesada.com/">Rafael Quesada</a> y son propiedad de su autor.</p>
				</div>
			</div>
		</footer>
		
<?php 
	wp_footer(); 
?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	<script>!window.jQuery && document.write("<script src='<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js'><\/script>")</script>
	<script src='<?php echo get_template_directory_uri(); ?>/js/scripts.js'></script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-XXXXXXX-X', 'XXX');
	  ga('send', 'pageview');
	</script>
		
    </body>
    
</html>