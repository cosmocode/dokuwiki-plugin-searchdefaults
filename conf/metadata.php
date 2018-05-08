<?php
/**
 * Options for the searchdefaults plugin
 *
 * @author Michael Große <dokuwiki@cosmocode.de>
 */


$meta['default_sort'] = ['multichoice', '_choices' => ['hits', 'mtime']];
$meta['default_time_limit'] = ['multichoice', '_choices' => ['any', 'week', 'month', 'year']];
