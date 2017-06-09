# collect_weather_data

気象庁の過去の時間帯別天気情報をスクレイピングするプログラムです。


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
