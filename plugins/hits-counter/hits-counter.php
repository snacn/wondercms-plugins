<?php
/**
 * Hits counter.
 *
 * Simple hits/visits counter. Hits are displayed in the footer once the admin is logged in.
 * Hits will not be incremented if admin is logged in.
 *
 * @author Yassine Addi <yassineaddi.dev@gmail.com> // Forked by Robert Isoski
 * @version 3.0
 */

global $Wcms;

if (defined('VERSION') && !defined('version')) {
	define('version', VERSION);
}

$Wcms->addListener('menu', 'incrementHits');
$Wcms->addListener('footer', 'displayHits');

function incrementHits ($args) {
    global $Wcms;
	if ($Wcms->loggedIn) return $args;
	$hits = file_exists(__DIR__ . '/hits.txt') ? (int) file_get_contents(__DIR__ . '/hits.txt') : 0;
	if ( ! isset($_SESSION['_wcms_hits_counter'])) {
		$_SESSION['_wcms_hits_counter'] = time();
		$hits++;
	}
	if ((time()-$_SESSION['_wcms_hits_counter'])>600)
		$hits++;
	$_SESSION['_wcms_hits_counter'] = time();
	file_put_contents(__DIR__ . '/hits.txt', $hits);
	return $args;
}

function displayHits ($args) {
    global $Wcms;
	if ( ! $Wcms->loggedIn) return $args;
	$hits = file_exists(__DIR__ . '/hits.txt') ? (int) file_get_contents(__DIR__ . '/hits.txt') : 0;
	$args[0] .= ' &bull; Hits: ' . $hits;
	return $args;
}
