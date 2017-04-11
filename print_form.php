<?php

Print <<<HERE
<html>
<head>

</head>
<body>
<script type="text/javascript" src="index.js"></script>
<form name="form" method="GET">
    Введите ссылку: <input type="text" name="inputText" id="inputText" onkeyup="change_status()" onchange="change_status()"> <br>
	Желаемый вид ссылки (по желанию): http://proj8.ru/ <input type="text" name="desireText" id="desireText"> <br>
	<input type="button" name="start"  onclick="doWork()" value="Сгенерировать">
</form>
<script type ="text/javascript" src="change_status.js"></script>
<div id="answer"></div>

</body>
</html>
HERE

?>