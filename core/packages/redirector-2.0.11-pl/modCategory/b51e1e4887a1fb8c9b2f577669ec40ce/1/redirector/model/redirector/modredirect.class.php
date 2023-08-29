<?php
/**
 * @package redirector
 */
class modRedirect extends xPDOSimpleObject {

    public function registerTrigger() {

        $triggered = $this->get('triggered');
        $this->set('triggered', ($triggered+1));

        $triggeredFirst = $this->get('triggered_first');
        if(empty($triggeredFirst)) {
            $this->set('triggered_first', time());
        }

        $this->set('triggered_last', time());
        return $this->save();
    }
}