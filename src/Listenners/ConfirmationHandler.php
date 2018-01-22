<?php

namespace Laravel\Aws\Listenners;

use Laravel\Aws\Events\ConfirmationReveiced;

class ConfirmationHandler
{
    /**
     * @param ConfirmationReveiced $event
     */
    public function handle(ConfirmationReveiced $event)
    {
        // TODO:
    }
}
