<?php

defined('MOODLE_INTERNAL') || die();

$bodyattributes = $OUTPUT->body_attributes();

$templatecontext = [
    'mcpiLogo' => $OUTPUT->image_url('login/mcpi', 'theme'),
    'paascuLogo' => $this->image_url('login/paascu', 'theme'),
    'dacetLogo' => $this->image_url('login/dacet', 'theme'),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes
];

echo $OUTPUT->render_from_template('theme_boost/login', $templatecontext);
