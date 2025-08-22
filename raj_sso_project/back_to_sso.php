<?php
$token = trim(file_get_contents('token.txt'));
?>
<form name="frm1" action="https://ssotest.rajasthan.gov.in/sso" method="post">
    <input type="hidden" name="userdetails" value="<?= htmlspecialchars($token) ?>" />
    <input type="submit" value="Back To SSO" />
</form>