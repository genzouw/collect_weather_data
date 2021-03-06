# collect_weather_data

It is a program to scrape weather information by the past time zone of Japan Meteorological Agency.

*Please contact me anytime if you have a problem or request! My information is posted at the bottom of this document.*

## Requirements

* PHP 5.4 or higher
* [Composer](https://getcomposer.org/)


## Set up

```sh
$ git clone https://github.com/genzouw/collect_weather_data.git

$ cd collect_weather_data/

$ composer install

```


## Execution

```sh

# from 1980-01-01 to yesterday
$ ./main.php

# from 1990-12-31 to yesterday
$ ./main.php '1990-12-31'

# from 1990-12-31 to 1991-01-02
$ ./main.php '1990-12-31' '1991-01-02'

```

## License

This software is released under the MIT License, see LICENSE.


## Author Information

[genzouw](https://genzouw.com)

* Twitter   : @genzouw ( https://twitter.com/genzouw )
* Facebook  : genzouw ( https://www.facebook.com/genzouw )
* LinkedIn  : genzouw ( https://www.linkedin.com/in/genzouw/ )
* Gmail     : genzouw@gmail.com
