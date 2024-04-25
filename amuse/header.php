<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155092797-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-155092797-1');
    </script>
    <!-- EasyWeek Appointment Widget: https://easyweek.com.ua/ -->
    <script src="https://widget.easyweek.io/widget.js"></script>
    <script>
        let buttonText = "<?php esc_js( the_field('text_for_easyweek_widget'));?>";
        var ewWidget = new EasyWeekWidget({url: 'https://widget.easyweek.io/a-muse',
            button: { text: buttonText, showText: true, color: '#ffffff',
                background: 'rgba(236, 41, 133, 0.75)', textColor: '#ffffff', textBackground: 'rgba(236, 41, 133, 0.75)' }})
    </script>
    <?php wp_head(); ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">
<!--     CSS-->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/style.css">
    <title>Музыкальная школа для детей и взрослых "A-Muse"</title>
</head>
<body <?php body_class(); ?>>