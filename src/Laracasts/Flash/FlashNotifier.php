<?php

namespace Laracasts\Flash;

class FlashNotifier
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param  string $message
     * @return $this
     */
    public function info($message)
    {
        $this->message($message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message)
    {
        $this->message($message, 'danger');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning');

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @param  string $level
     * @return $this
     */
    public function overlay($message, $title = 'Notice', $level = 'info')
    {
        $this->message($message, $level);

        $this->session->flash('flash_notification.overlay', true);
        $this->session->flash('flash_notification.title', $title);

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($message, $level = 'info', $title=null)
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        if( !empty( $title ) ) {
            $this->session->flash('flash_notification.title', $title);
        }

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

    /**
     * Add an "notice" flash to the session.
     *
     * @param  int $timeout
     * @return $this
     */
    public function notice($timeout=3)
    {
        $this->session->flash('flash_notification.notice', true);
        $this->session->flash('flash_notification.timeout', ($timeout*1000));

        return $this;
    }

    /**
     * Add an "notice" flash to the session.
     *
     * @param  int $timeout
     * @return $this
     */
    public function sweet($timeout=2)
    {
        //"warning", "error", "success" and "info"
        $this->session->flash('flash_notification.sweet', true);
        $this->session->flash('flash_notification.timeout', ($timeout*1000));

        return $this;
    }
}

