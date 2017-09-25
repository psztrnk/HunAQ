# HunAQ
Hungarian Air Quality parser based on data from [legszennyezes.hu](http://legszennyezes.hu).

## Data Source
- HunAQ parses the air quality pages of legszennyezes.hu, provided by Válaszúton hagyományőrző és Környezetvédő Alapítvány.
- Data is provided by the Országos Légszennyezettségi Mérőhálózat (Hungarian Air Quality Monitoring Network).

## Default Settings and how to Change Them
- The default city is set to Miskolc.
  - To change this, go to Line 16 of `index.php` and change the city name in the link:
  - `$html = file_get_html('http://www.legszennyezes.hu/[CITYNAME]');`
  - You can find the available cities on [legszennyezes.hu](http://legszennyezes.hu).
- By default, there is no special body classes defined in `style.css`. In the HTML DOM, body classes are set based on the parsed value stored as `$overallQuality` and can get the following values (ASC from natural to dangerous):
  - `body class="természetes"` (define in `style.css` as `body.természetes`)
  - `body class="elfogadható"` (define in `style.css` as `body.elfogadható`)
  - `body class="tűrhető"` (define in `style.css` as `body.tűrhető`)
  - `body class="kedvezőtlen"` (define in `style.css` as `body.kedvezőtlen`)
  - `body class="problémás"` (define in `style.css` as `body.problémás`)
  - `body class="egészségtelen"` (define in `style.css` as `body.egészségtelen`)
  - `body class="káros"` (define in `style.css` as `body.káros`)
  - `body class="veszélyes"` (define in `style.css` as `body.veszélyes`)
  
## Third Party Resources
- HunAQ uses [PHP Simple HTML DOM Parser](https://sourceforge.net/projects/simplehtmldom/) licensed under the [MIT License](https://opensource.org/licenses/MIT).
- HunAQ uses the [Resagnicto font](http://www.abstractfonts.com/font/14896), licensed under the [SIL Open Font License, Version 1.1](http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL).

## License

HunAQ is in the Public Domain (see the file `LICENSE`).
