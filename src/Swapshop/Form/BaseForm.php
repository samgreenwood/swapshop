<?php namespace Swapshop\Form;

use Laracasts\Validation\FormValidator;

class BaseForm extends FormValidator
{
    /**
     * @var array
     */
    protected $formData;

    /**
     * @param mixed $formData
     * @return mixed
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function validate($formData)
    {
        $this->formData = $formData;

        return parent::validate($formData);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->formData;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->formData)) return $this->formData[$key];

        return null;
    }

}