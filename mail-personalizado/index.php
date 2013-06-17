<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Better Check Boxes with jQuery and CSS | Tutorialzine Demo</title>

<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.tzCheckbox.css" />

</head>
<body>

<div id="page">

	<form method="post" action="./recibir.php">
    	<ul>
    		<li><label for="ch_effects">Display effects: </label><input type="checkbox" id="ch_effects" name="ch_effects" data-on="Show effects" data-off="Hide effects" /></li>
        	<li><label for="ch_location">Enable location tracking: </label><input type="checkbox" id="ch_location" name="ch_location" checked /></li>
	        <li><label for="ch_showsearch">Include me in search results: </label><input type="checkbox" id="ch_showsearch" name="ch_showsearch" /></li>
	        <li><label for="ch_emails">Email notifications: </label><input type="checkbox" id="ch_emails" name="ch_emails" data-on="ON" data-off="OFF" /></li>
	        <li><label for="ch_submit">Email notifications: </label><input type="submit" id="env_form" name="env_form" value="Enviar" /></li>
        </ul>
    </form>

    <!-- You are free to remove this footer -->
    
    <div id="footer">
        <h2>Better Check Boxes with jQuery and CSS</h2>
        <a class="tzine" href="http://tutorialzine.com/2011/03/better-check-boxes-jquery-css/">Read &amp; Download on</a>
    </div>

</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/jquery.tzCheckbox.js"></script>
<script src="js/script.js"></script>

<!-- BSA AdPacks code. Please ignore and remove. -->
<script src="http://cdn.tutorialzine.com/misc/adPacks/v1.js" async></script>

</body>
</html>