<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <title>
        
        <?php
                
            wp_title( '|', true, 'right' );
            bloginfo('name');
            if ( is_home() || is_front_page() ) echo ' - ' . get_bloginfo( 'description' );
            
        ?>
        
    </title>
    
    <meta name="viewport" content="width=device-width" />
    
    <?php $file_dir = plugins_url('/assets/', dirname(__FILE__) ); ?>
        
    <link rel='stylesheet' id='bootstrap-css'  href='<?php echo $file_dir; ?>css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='<?php echo $file_dir; ?>css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='<?php echo $file_dir; ?>css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='vegas-css'  href='<?php echo $file_dir; ?>css/vegas.css' type='text/css' media='all' />
    <link rel='stylesheet' id='googlefonts-css'  href='<?php echo wip_incoming_lite_init::google_fonts(); ?>' type='text/css' media='all' />
    
    <?php wip_incoming_lite_style(); ?>
        
    <!--[if IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

<body>

	<div class="container" >
    
        <div class="row">
    
            <div class="col-md-12">
            
                <div id="wrapper">
            
                    <header id="header">
                        
                        <div id="logo">
                                    
                            <a href="<?php esc_url(bloginfo('url')) ?>" title="<?php bloginfo('name') ?>">
                            
                                <?php
                                    
                                    if ( !wip_incoming_lite_setting('wip_incoming_logo_image') ) :
                    
                                        bloginfo('name');
                                        echo '<span>' . get_bloginfo( 'description' ) . '</span>';
                                        
                                    else:
                                                
                                        echo "<img src='".esc_url(wip_incoming_lite_setting('wip_incoming_logo_image'))."' alt='logo'>"; 
                                            
                                    endif; 
    
                                ?>
                                                
                            </a>
                                        
                        </div>
                                
                        <ul id="countdown">
                        
                            <li><span class="time days">00</span><p class="days_text">Days</p></li>
                            <li><span class="time hours">00</span><p class="hours_text">Hours</p></li>
                            <li><span class="time minutes">00</span><p class="minutes_text">Minutes</p></li>
                            <li><span class="time seconds">00</span><p class="seconds_text">Seconds</p></li>
                       
                        </ul>
    
                    </header>
                    
                    <section class="page">
                        
					<?php 
						
						if ( wip_incoming_lite_setting('wip_incoming_content')) :
							
							echo '<div class="content">' . stripslashes(wip_incoming_lite_setting('wip_incoming_content')) . '</div>'; 
							
						endif;
							
						if ( wip_incoming_lite_setting('wip_incoming_show_newsletter') == "on" ) :  ?>
                            
                            <div class="content">
                                
                                <?php 
								
									if ( wip_incoming_lite_setting('wip_incoming_newsletter_title') )
										echo '<h2>' . wip_incoming_lite_setting('wip_incoming_newsletter_title') . '</h2>';
								
								?>
                                
                                <section class="newsletter-form">
                    
                                    <form method="post" class="validate" action="<?php echo wip_incoming_lite_setting('wip_incoming_newsletter_url_action'); ?>">
                                        <input type="text" placeholder="<?php _e( 'Your email', 'wip-incoming-lite' ) ?>"  name="<?php echo wip_incoming_lite_setting('wip_incoming_newsletter_email_name','EMAIL'); ?>"/>
                                        <input type="submit" name="subscribe" value="<?php _e( 'Sign Up', 'wip-incoming-lite' ) ?>" />
                                    </form>
                                        
                                    <div class="clear"></div> 
                                    
                                </section>
                    
                            </div>
                        
                        <?php endif;  ?>
                        
                    </section>
                
                    <footer id="footer" >
                       
                        <?php wip_incoming_lite_social_buttons(); ?>
                                
                        <div id="copyright">
                                
                            <?php 
                                    
                                if (wip_incoming_lite_setting('wip_copyright_text')): 
                                        
                                    echo stripslashes(wip_incoming_lite_setting('wip_copyright_text')); 
                                        
                                else:
                                         
                            ?>
                                        
                            Copyright © <?php bloginfo('name') ?> <?php echo date('Y'); ?> - Powered by <a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank">ThemeinProgress</a>
                                    
                            <?php endif; ?>
                
                        </div>
                            
                    </footer>
                
                </div>
           
            </div>
    
    	</div>
        
	</div>

	<script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
	
	<script type='text/javascript' src='<?php echo $file_dir; ?>js/jquery.form.js'></script>
	<script type='text/javascript' src='<?php echo $file_dir; ?>js/jquery.countdown.js'></script>
	<script type='text/javascript' src='<?php echo $file_dir; ?>js/jquery.vegas.min.js'></script>
	<script type='text/javascript' src='<?php echo $file_dir; ?>js/jquery.custom.js'></script>

	<?php 
	
		wip_incoming_lite_init::slideshow_script();
		wip_incoming_lite_init::countdown_script();
		
	?>
    
</body>

</html>