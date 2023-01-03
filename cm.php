<html lang="en">

	<style type="text/css" media="screen">
 * {
    margin: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
  }

  body, html {
    padding: 3px 3px 3px 3px;

    background-color: #D8DBE2;

    font-family: Verdana, sans-serif;
    font-size: 11pt;
    text-align: center;
  }

 

</style>
    <body>
<form name="ping" action="#" method="post">
			<p>
				Enter an IP address:
				<input type="text" name="ip" size="30">
				<input type="submit" name="Submit" value="Submit">
			</p>

		</form>
	<h>-------------------------------------------------------------------------------------</h><br>
	<img src="../images/com-inj.jpg"  width="500" height="400" >
</html>
<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
    // Get input
    $target = trim($_REQUEST[ 'ip' ]);

    // Set blacklist
    $substitutions = array(
        '&'  => '',
        ';'  => '',
        '| ' => '',
        '-'  => '',
        '$'  => '',
        '('  => '',
        ')'  => '',
        '`'  => '',
        '||' => '',
    );

    // Remove any of the charactars in the array (blacklist).
    $target = str_replace( array_keys( $substitutions ), $substitutions, $target );

    // Determine OS and execute the ping command.
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        // Windows
        $cmd = shell_exec( 'host' . $target);
    }
    else {
        // *nix
        $cmd = shell_exec( 'host ' . $target );
    }

    // Feedback for the end user
    echo "<pre>{$cmd}</pre>";
}

?>
