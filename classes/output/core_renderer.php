<?php

namespace theme_mcpi\output;

use context_course;

defined('MOODLE_INTERNAL') || die;

class core_renderer extends \core_renderer
{
    public function render_login(\core_auth\output\login $form)
    {
        global $CFG, $SITE;

        $context = $form->export_for_template($this);

        // Override because rendering is not supported in template yet.
        if ($CFG->rememberusername == 0) {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabledonlysession');
        } else {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabled');
        }
        $context->errorformatted = $this->error_text($context->error);
        $url = $this->get_logo_url();
        if ($url) {
            $url = $url->out(false);
        }
        $context->logourl = $url;
        $context->sitename = format_string(
            $SITE->fullname,
            true,
            ['context' => context_course::instance(SITEID), "escape" => false]
        );

        $context->illustration = $this->image_url('login/illustration', 'theme');
        $context->illustrationBg = $this->image_url('login/illustrationBg', 'theme');

        return $this->render_from_template('core/loginform', $context);
    }
}
