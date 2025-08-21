<?php
$token = trim(file_get_contents('token.txt'));
?>
<form name="frm2" action="https://ssotest.rajasthan.gov.in/signout" method="post">
    <input type="hidden" name="userdetails" value="<?= htmlspecialchars($token) ?>" />
    <input type="submit" value="Signout from SSO" />
</form>