<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\File\File;


class EventListTwigExtension extends \Twig_Extension
{
	private $numevents = 1;
	public function setNumEvents($numevents) { 
        $this->numevents = $numevents; 
    }
    private $ICSfile = NULL;
    public function setICSfile($icsfile) { 
        $this->ICSfile = $icsfile; 
    }
    public function getName()
    {
        return 'EventListTwigExtension';
    }
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('eventlist', [$this, 'eventFunction'])
        ];
    }
    public function eventFunction()
    {
		require_once __DIR__ . '/../vendor/autoload.php';
        $cal = new \om\IcalParser();
        if (! file_exists($this->ICSfile))	return NULL;
		$results = $cal->parseFile($this->ICSfile	);
		$eventList = '';
		$i = 0;
		// DONE: start list Today (not oldest Event)
		$today = (int) date('U');	// seconds since 01.01.1970
		foreach ($cal->getSortedEvents() as $r) {
			// DONE: include URL !
			if (((int) $r['DTSTART']->format('U')) > $today)	{
				if (isset($r['URL']))
					$eventList .= sprintf('	<li>%s - <a href="%s">%s</a></li>' . PHP_EOL, $r['DTSTART']->format('d.m.Y'), $r['URL'],$r['SUMMARY']);
				else
					$eventList .= sprintf('	<li>%s - %s</li>' . PHP_EOL, $r['DTSTART']->format('d.m.Y'), $r['SUMMARY']);
				$i++;
			}
			if ($i >= $this->numevents)	{ break; }	
		}
		return $eventList;
    }
}
?>
