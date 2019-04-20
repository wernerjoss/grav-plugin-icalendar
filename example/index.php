<!DOCTYPE html>
<html lang="de-DE">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Ical Parser example</title>

</head>
<body>
<div class="container">
	<h1>Ical Parser example</h1>

	<ul>
		<?php
		require_once __DIR__ . '/../vendor/autoload.php';
		$cal = new \om\IcalParser();
		$results = $cal->parseFile(
			'https://www.google.com/calendar/ical/cs.czech%23holiday%40group.v.calendar.google.com/public/basic.ics'
		);

		foreach ($cal->getSortedEvents() as $r) {
			echo sprintf('	<li>%s - %s - <a href="%s">%s</a></li>' . PHP_EOL, $r['DTSTART']->format('d.m.Y'), $r['SUMMARY'], $r['URL'],$r['URL']);
		}

		?></ul>
</div>
</body>
</html>
