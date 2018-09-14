<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 11:02 AM.
 */

namespace Ayim\LaravelValidMail;

class LaravelValidMailResponse
{
    public $status;

    /**
     * LaravelValidMailResponse constructor.
     *
     * @param mixed  $code
     * @param mixed  $response
     * @param string $err
     */
    public function __construct($code, $response, string $err)
    {
        $this->status = $code;
        $this->t_response = json_decode($response);
        $this->setResponse();
    }

    private function setResponse()
    {
        if ($this->status === 200) {
            $validity = $this->checkValid();
            if ($validity === true) {
                $this->isValid = true;
            } else {
                $this->isValid = false;
                $this->invalid_reason = $validity;
            }
        } else {
            $this->error = $this->t_response ? $this->t_response->message : $this->t_response;
        }
        unset($this->t_response);
    }

    /**
     * @return bool
     */
    private function checkValid()
    {
        $error_responses = config('laramail.error_responses')[config('laramail.lang')];

        if (!$this->t_response->validFormat) {
            $return = $error_responses['format'];
        }
        if (!$this->t_response->deliverable) {
            $return = $error_responses['delivery'];
        }
        if ($this->t_response->fullInbox) {
            $return = $error_responses['inbox'];
        }
        if (!$this->t_response->hostExists) {
            $return = $error_responses['host'];
        }

        return isset($return) ? $return : true;
    }
}
