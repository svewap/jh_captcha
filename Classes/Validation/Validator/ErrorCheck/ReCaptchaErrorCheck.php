<?php

namespace Haffner\JhCaptcha\Validation\Validator\ErrorCheck;

/**
 * Class ReCaptchaErrorCheck
 * EXT:formhandler ErrorCheck for ReCaptcha
 */
class ReCaptchaErrorCheck extends Tx_Formhandler_AbstractErrorCheck {

    /**
     * @var |Haffner\JhCaptcha\Validation\Validator\ReCaptchaValidator
     * @inject
     */
    protected $reCaptchaValidator;

    /**
     * Checks the ReCaptcha
     *
     * @return string
     */
    public function check() {
        $checkFailed = '';
        if (isset($this->gp[$this->formFieldName])) {
            // validate the captcha
            $result = $this->reCaptchaValidator->validate($this->gp[$this->formFieldName]);
            // check errors
            $errors = $result->getErrors();
            if(!empty($errors)) {
                $checkFailed = $this->getCheckFailed();
            }
        }
        return $checkFailed;
    }
}

?>