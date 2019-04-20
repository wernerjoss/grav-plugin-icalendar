# Icalendar Plugin

The **Icalendar** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Reads ICS Files and shows Events List on your Page(s)

## Installation

Installing the Icalendar plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install icalendar

This will install the Icalendar plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/icalendar`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `icalendar`. You can find these files on [GitHub](https://github.com/werner-hoernerfranzracing-de/grav-plugin-icalendar) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/icalendar
    
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

In Addition, it requires [om/icalparser](https://github.com/OzzyCzech/icalparser) to be installed in same Directory.
To do that, just open a shell, change to the Plugin directory and run 'composer install' from there !

### Admin Plugin

If you use the admin plugin, you can install directly through the admin plugin by browsing the `Plugins` tab and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/icalendar/icalendar.yaml` to `user/config/plugins/icalendar.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml

enabled: true
icsfile: example.ics    # your ics Calendar File (in user/data/calendars)
numevents: 2    # max, No. of Events in List

```

Note that if you use the admin plugin, a file with your configuration, and named icalendar.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage

Once installed and enabled, you can use this Plugin to parse an ICS Calendar File (must be found in user/data/calendars and added to user/config/plugins/icalendar.yaml) and display Events from that Calendar anywhere on your Site using 

    {{ eventlist() }} 
    
in the appropriate template (or page, if twig processing is enabled).
You can use

    <ul></ul>
    
or 

    <ol></ol> 
    
around the shortcut to get the desired List Type.
Additionally, you can specify a maximum Numer of Events to be incorporated in the List, just use numevents: XX in config File.
Note: The Events List will only show Events in the Future !

## Credits

This Plugin requires and depends on [om/icalparser](https://github.com/OzzyCzech/icalparser) - Kudos to Roman Ožana :)

## To Do

- [ ] add Calendar Widget (not just Events List)
- [ ] evtl. add Option to also show Events from the Past

