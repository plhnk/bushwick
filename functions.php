<?php

/*
	Custom theme functions

	Note: we recommend you prefix all your functions to avoid any naming
	collisions or wrap your functions with if function_exists braces.
*/
function numeral($number) {
	$test = abs($number) % 10;
	$ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 4) ? 'th' : (($test < 4) ? ($test < 3) ? ($test < 2) ? ($test < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
	return $number . $ext;
}

function count_words($str) {
	return count(preg_split('/\s+/', strip_tags($str), null, PREG_SPLIT_NO_EMPTY));
}

function pluralise($amount, $str, $alt = '') {
	return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

/* Need to comment out in anchor/functions/articles */

function article_date() {
	if($created = Registry::prop('article', 'created')) {
		return Date::format($created, 'j.m.Y');
	}
}

function relative_time($date) {
	if(is_numeric($date)) $date = '@' . $date;

	$user_timezone = new DateTimeZone(Config::app('timezone'));
	$date = new DateTime($date, $user_timezone);

	// get current date in user timezone
	$now = new DateTime('now', $user_timezone);

	$elapsed = $now->format('U') - $date->format('U');

	if($elapsed <= 1) {
		return 'Just now';
	}

	$times = array(
		31104000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach($times as $seconds => $title) {
		$rounded = $elapsed / $seconds;

		if($rounded > 1) {
			$rounded = round($rounded);
			return $rounded . ' ' . pluralise($rounded, $title) . ' ago';
		}
	}
}

/*function latest_post($limit = 1) {
    if( ! $posts = Registry::get('latest_post')) {
        $posts = Post::where('status', '=', 'published')->sort('created', 'desc')->take($limit)->get();

        Registry::set('latest_post', $posts = new Items($posts));
    }

    if($result = $posts->valid()) {
        // register single post
        Registry::set('latest_article', $posts->current());

        // move to next
        $posts->next();
    }
    // back to the start
    else $posts->rewind();

    return $result;
}*/

function latest_post($limit = 1) {
    $posts = Post::where('status', '=', 'published')->sort('created', 'desc')->take($limit)->fetch();
    return $posts;
}

function article_excerpt($limit = 140, $suffix = '…') {
    //  Get the article HTML to check
	$content = strip_tags(article_html());
	$len = strlen($content);

	if($len < $limit) {
		return $content;
	}

	return strpos($content, 0, $limit) . $suffix;
}