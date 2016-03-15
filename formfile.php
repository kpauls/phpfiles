<form method="POST">
<input name="tweet" type="text"/>
<input name="email" type="text"/>
<input name="submit" value="Submit" type="submit"/>
</form>
<pre>

<?php
var_dump( $_POST );

    if( isset($_POST)['email'] ) )
{
    $tweet -$_POST['email'];
}

