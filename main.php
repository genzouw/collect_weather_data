#!/usr/bin/env php
<?php

require getenv('HOME') . '/.composer/vendor/autoload.php';

use Carbon\Carbon;

$header = array(
    '年月日時分秒',
    '都道府県コード',
    '地区コード',
    '現地気圧',
    '海面気圧',
    '降水量',
    '気温',
    '露点温度',
    '蒸気圧',
    '湿度',
    '風速',
    '風向',
    '日照時間',
    '全天日射量',
    '降雪',
    '積雪',
    '天気',
    '雲量',
    '視程',
);

echo implode($header, ","), PHP_EOL;

for (
    $targetDate = new Carbon('1980-01-01');
    // $targetDate = new Carbon('1991-07-01');
    $targetDate->year < 2018;
    $targetDate->addDay()
) {

    $year = $targetDate->year;
    $month = $targetDate->month;
    $day = $targetDate->day;

    // これはなんだろう？
    $precNo = 62;
    $blockNo = 47772;

    $dom = phpQuery::newDocument(file_get_contents(
        "http://www.data.jma.go.jp/obd/stats/etrn/view/hourly_s1.php?prec_no={$precNo}&block_no={$blockNo}&year={$year}&month={$month}&day={$day}&view="
    ));

    pq($dom)->find(
        "#tablefix1 tr"
    )->each(function($it) use ($year, $month, $day, $precNo, $blockNo) {
        $td = pq($it)->find('td');

        $hour = $td->eq(0)->text();

        if (mb_strlen($hour, 'utf-8') === 0) {
            return;
        }

        echo implode(array(
            "{$year}-{$month}-{$day} {$hour}:00:00",
           $precNo,
           $blockNo,
            $td->eq(1)->text(),
            $td->eq(2)->text(),
            $td->eq(3)->text(),
            $td->eq(4)->text(),
            $td->eq(5)->text(),
            $td->eq(6)->text(),
            $td->eq(7)->text(),
            $td->eq(8)->text(),
            $td->eq(9)->text(),
            $td->eq(10)->text(),
            $td->eq(11)->text(),
            $td->eq(12)->text(),
            $td->eq(13)->text(),
            ($td->eq(14)->find('img') ? $td->eq(14)->find('img')->attr('alt') : ''),
            $td->eq(15)->text(),
            $td->eq(16)->text(),
        ), ',') . PHP_EOL;

    });
}
