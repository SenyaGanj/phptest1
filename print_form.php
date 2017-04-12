<?php

Print <<<HERE
<html>
<head>

</head>
<body>
<script type="text/javascript" src="index.js"></script>
<form name="form" method="GET">
<table>
    <tr><td><p align="right">Введите ссылку:</p></td>
	<td><input type="text" name="inputText" id="inputText" onkeyup="change_status()" onchange="change_status()" size=45></td></tr>
	<tr><td>Желаемый вид ссылки (по желанию): <b>http://proj8.ru/<b></td>
	<td><input type="text" name="desireText" id="desireText"> <br></td></tr>
	<tr><td></td><td><input type="button" name="start"  onclick="doWork()" value="Сгенерировать"></td></tr>
</table>
</form>
<script type ="text/javascript" src="change_status.js"></script>
<div id="answer"></div>

</body>
</html>
HERE

?>