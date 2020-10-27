# Quartiersplattform Arrenberg

Repo für die Quartiersplattform am Arrenberg <br> <br>
Globale Entwicklungsumgebung unter [AP1](https://ap1.arrenberg.studio) <br>
Plugins werden unter [AP01](https://ap01.arrenberg.studio) getestet<br>
Mockup auf [Marvel](https://marvelapp.com/prototype/8gfhabd/screen/73095691) <br>

## Notizen

## Requirements 

### Server
`Wordpress` 5.5.1 <br>
`PHP` 7.2.10

### Plugins

`WP Sync DB` Get Data from [AP1](http://ap1.arrenberg.studio/wp-admin/) <br>
`Advanced Custom Fields PRO` <br>
`Favorites` [Git](https://github.com/kylephillips/favorites) <br>
`PWA for WP` *later* [Git](https://github.com/ahmedkaludi/pwa-for-wp) <br>
`Disable Rest API` *later* <br>

#### Optional (Development)
`Custom Post Type UI`

## Set up
* Setup local Wordpress 
* Clone Repository
`git clone <URL>` in `wp-content/themes`
* Sync Database with `WP Sync DB`
* Copy `wp-content` manually

## Development

### File structure
Images, Icons, Fonts, etc. => `assets/` <br>
Pages (Templates) => `templates/` <br>
Template Parts (View iteration) => `template-parts` <br>
Define colors => `inc/custom-css.php` <br>
Functions => `functions.php` <br>
Call to Action, Energie Ampel, Feedback, etc => `components/` <br>
Lists => `template-parts/` <br>

### Notes

Google Maps API Key `AIzaSyBmTAYFwzl41BtNCEShQ2OzTbpHMSnxAL4`