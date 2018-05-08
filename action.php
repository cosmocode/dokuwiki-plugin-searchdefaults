<?php
/**
 * DokuWiki Plugin searchdefaults (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Michael Große <dokuwiki@cosmocode.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

class action_plugin_searchdefaults extends DokuWiki_Action_Plugin {

    /**
     * Registers a callback function for a given event
     *
     * @param Doku_Event_Handler $controller DokuWiki's event controller object
     * @return void
     */
    public function register(Doku_Event_Handler $controller) {
       $controller->register_hook('FORM_QUICKSEARCH_OUTPUT', 'BEFORE', $this, 'handle_form_quicksearch_output');
    }

    /**
     * Handles the FORM_QUICKSEARCH_OUTPUT event
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  [the parameters passed as fifth argument to register_hook() when this
     *                           handler was registered]
     * @return void
     */
    public function handle_form_quicksearch_output(Doku_Event $event, $param) {
        /** @var \dokuwiki\Form\Form $qsearchForm */
        $qsearchForm = $event->data;
        if ($this->getConf('default_sort') === 'mtime') {
            $qsearchForm->setHiddenField('srt', 'mtime');
        }
        if ($this->getConf('default_time_limit') !== 'any') {
            $qsearchForm->setHiddenField('min', '1 ' . $this->getConf('default_time_limit') . ' ago');
        }
    }

}
