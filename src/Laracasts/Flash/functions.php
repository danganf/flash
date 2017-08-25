<?php

if ( ! function_exists('flash')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \Laracasts\Flash\FlashNotifier
     */
    function flash($message = null, $level = 'info', $title=null)
    {
        $notifier = app('flash');

        if ( ! is_null($message)) {
            $title = ( strpos( ' error ', $level ) === FALSE ? $title : 'Erro' );
            return $notifier->message($message, $level, $title);
        }

        return $notifier;
    }

}
