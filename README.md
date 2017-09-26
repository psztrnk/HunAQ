# HunAQ
Hungarian Air Quality parser based on data from [The World Air Quality Index Project Team](http://aqicn.org).

See a demo of HunAQ [here](https://paszternak.me/air).

## Data Source
- HunAQ parses the data provided by the JSON API of The World Air Quality Index Project Team.
- Hungarian data is provided to AQICN by the Országos Légszennyezettségi Mérőhálózat (Hungarian Air Quality Monitoring Network).

## Default Settings and how to Change Them
- The default JSON source is set to AQICN's demo JSON feed.
  - To change this, go to Line 11 of `index.php` and change the source:
  - `$html = json_decode(file_get_contents('http://api.waqi.info/feed/[CITY]/?token=[API KEY TOKEN]'));`
  - You can request a free token at (http://aqicn.org/data-platform/token/).
  
## Third Party Resources
- HunAQ uses the [Resagnicto font](http://www.abstractfonts.com/font/14896), licensed under the [SIL Open Font License, Version 1.1](http://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL).
- HunAQ uses public domain (CC0) images from Pixabay as backgrounds. Nevertheless you can find the respective authors and links in the footer of `index.php`. 

## License

HunAQ is in the Public Domain (see the file `LICENSE`).
