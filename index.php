<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>SocketControl</title>
        <link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
		<link rel="apple-touch-icon" href="img/icon57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="img/icon72x72.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="img/icon114x114.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="img/icon144x144.png" />
    	<link rel="apple-touch-startup-image" href="img/splash.png" />  
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.mobile-1.2.0.min.js"></script>
        <script>
            try {

    $(function() {

    });

  } catch (error) {
    console.error("Your javascript has an error: " + error);
  }
        </script>
    </head>
    <body>
<?php
for ($i = 1; $i <= sizeOf($groups); $i++) {
?>
        <div data-role="page" id="page<?php echo($i)?>">
            <div data-theme="a" data-role="header">
                <h3>
                    SocketControl
                </h3>
                <div data-role="navbar" data-iconpos="none">
                    <ul>
<?php
for ($j = 1; $j <= sizeOf($groups); $j++) {
?>
                        <li>
                            <a href="#page<?php echo($j); ?>" data-transition="flip" data-theme="" data-icon="">
                                <?php echo($groups[$j]["name"]); ?>
                            </a>
                        </li>
<?php
}
?>
                    </ul>
                </div>
            </div>
            <div data-role="content">
<?php
for ($k = 0; $k <= sizeOf($sockets); $k++) {
if ($k == 0) {
			$sockets[0]["name"] = "Gesamte Gruppe";
			$sockets[0]["groupid"] = $i;
			$sockets[0]["socketid"] = "0";
		}
		if ($sockets[$k]["groupid"] == $i) {
?>
				<div data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="horizontal">
                        <legend>
                            <?php echo($sockets[$k]["name"]); ?>
                        </legend>
                        <input id="<?php echo($sockets[$k]["groupid"] . "_" . $sockets[$k]["socketid"]);?>Off" name="<?php echo($sockets[$k]["groupid"] . "_" . $sockets[$k]["socketid"]);?>" value="0" type="radio" />
                        <label for="<?php echo($sockets[$k]["groupid"] . "_" . $sockets[$k]["socketid"]);?>Off">
                            Off
                        </label>
                        <input id="<?php echo($sockets[$k]["groupid"] . "_" . $sockets[$k]["socketid"]);?>On" name="<?php echo($sockets[$k]["groupid"] . "_" . $sockets[$k]["socketid"]);?>" value="1" type="radio" />
                        <label for="<?php echo($sockets[$k]["groupid"] .  "_" . $sockets[$k]["socketid"]);?>On">
                            On
                        </label>
                    </fieldset>
                </div>
                
<?php
	}
}
?>
            </div>
        </div>
<?php
}
?>
<script>
		
		$( "input" ).bind( "change", function(event, ui) {
			console.log($(this).attr('id') + ' - ' + $(this).val());
			$.ajax({
				  url: 'send.php',
				  type: "POST",
				  data: {name : $(this).attr('name'), state: $(this).val(), timestamp: new Date().getTime()},
				  
				  success: function(data) {
					console.log(data);					
				  }
				});					
		});
            //App custom javascript
        </script>
    </body>
</html>
