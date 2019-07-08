<?php
// see https://learn.getgrav.org/15/cookbook/plugin-recipes#output-some-php-code-result-in-a-twig-template
namespace Grav\Plugin;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class IcalendarPlugin
 * @package Grav\Plugin
 */
class IcalendarPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
			'onTwigExtensions' => ['IcalTwigExtensions', 0]		// wichtig, funktioniert sonst nicht !!
		];
    }
	public function IcalTwigExtensions()
    {
        require_once(__DIR__ . '/classes/EventListTwigExtension.class.php');
        // see https://discourse.getgrav.org/t/set-variable-in-twig-extension-class/9193/3
        $ext = new EventListTwigExtension();
        // add optional dateformat, default 'd.m.Y' 08.07.19
        $dateformat = $this->config->get('plugins.icalendar.dateformat','d.m.Y');
        $ext->setDateFormat($dateformat);	
        // DONE: limit (numevents) from config (yaml)
        $numevents = $this->config->get('plugins.icalendar.numevents');
        $ext->setNumEvents($numevents);	
        //	$icsfile = (DATA_DIR . 'calendars/hoernerfranzracing.ics');
		// DONE: Filename from config (yaml) -> relative to DATA_DIR/calendars !
		$icsfile = (DATA_DIR . 'calendars/'.$this->config->get('plugins.icalendar.icsfile'));
        $ext->setICSfile($icsfile);
        $this->grav['twig']->twig->addExtension($ext);
    }
}
