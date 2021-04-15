
<aside class="clearfix">
    <div class="social_links">
        <h2>Find Me Elsewhere</h2>
        <ul class="elsewhere clearfix">
            <li><a href="<?php bloginfo('rss2_url'); ?>"><span data-icon="&#xe002;">&nbsp;</span>RSS</a></li>
            <li><a href="https://twitter.com/#!/danielwrobert" target="_blank"><span data-icon="&#xe001;">&nbsp;</span>Twitter</a></li>
            <li><a href="https://github.com/danielwrobert" target="_blank"><span data-icon="&#xe004;">&nbsp;</span>GitHub</a></li>
            <li><a href="https://instagram.com/danielwrobert" target="_blank"><span data-icon="&#xe003;">&nbsp;</span>Instagram</a></li>
        </ul>
    </div>

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- Anything here only shows up if you DON'T have any widgets active in this zone -->
	
	<?php endif; ?>

</aside>