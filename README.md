zf-form
=======

[![Latest Stable Version](https://poser.pugx.org/bupy7/zf-form/v/stable)](https://packagist.org/packages/bupy7/zf-form)
[![Total Downloads](https://poser.pugx.org/bupy7/zf-form/downloads)](https://packagist.org/packages/bupy7/zf-form)
[![Latest Unstable Version](https://poser.pugx.org/bupy7/zf-form/v/unstable)](https://packagist.org/packages/bupy7/zf-form)
[![License](https://poser.pugx.org/bupy7/zf-form/license)](https://packagist.org/packages/bupy7/zf-form)
[![Build Status](https://travis-ci.org/bupy7/zf-form.svg?branch=master)](https://travis-ci.org/bupy7/zf-form)
[![Coverage Status](https://coveralls.io/repos/github/bupy7/zf-form/badge.svg?branch=master)](https://coveralls.io/github/bupy7/zf-form?branch=master)

Simple form with [`zendframework/zend-inputfilter`](https://github.com/zendframework/zend-inputfilter)
and [`adamwathan/form`](https://github.com/adamwathan/form).

Installation
------------

The preferred way to install this extension is through composer.

Either run

$ php composer.phar require bupy7/zf-form "*"

or add

"bupy7/zf-form": "*"

to the require section of your composer.json file.

Usage
-----

Form:

```php
// Application/src/Form/SignInForm.php

use Bupy7\Form\FormAbstract;

class SignInForm extends FormAbstract
{
    protected function inputs()
    {
        return [
            [
                'name' => 'email',
                'required' => true,
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                    ],
                ],
            ],
            [
                'name' => 'password',
                'required' => true,
            ],
        ];
    }
}
```

View:

```php
// Application/view/auth/signin.phtml

<?php $formBuilder = $this->formBuilder($this->signInForm); ?>
<?= $formBuilder->open()->action($this->url('signin'))->addClass('form-horizontal'); ?>
    <div class="form-group required<?= $formBuilder->hasError('email') ? ' has-error' : ''; ?>">
        <?= $formBuilder->label('Email')->forId('email')->addClass('control-label col-md-2'); ?>
        <div class="col-md-4">
            <?= $formBuilder->email('email')->addClass('form-control'); ?>
            <div class="help-block help-block-error">
                <?= $formBuilder->getError('email'); ?>
            </div>
        </div>
    </div>
    <div class="form-group required<?= $formBuilder->hasError('password') ? ' has-error' : ''; ?>">
        <?= $formBuilder->label('Password')->forId('password')->addClass('control-label col-md-2'); ?>
        <div class="col-md-4">
            <?= $formBuilder->password('password')->addClass('form-control'); ?>
            <div class="help-block help-block-error">
                <?= $formBuilder->getError('password'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-2">
            <?= $formBuilder->button('Signin')->attribute('type', 'submit')->addClass('btn btn-primary'); ?>
        </div>
    </div>
<?= $formBuilder->close(); ?>
```

Controller:

```php
// Application/src/Controller/AuthController.php

use Application/Form/SignInForm;

public function signinAction()
{
    $signInForm = new SignInForm;
    if ($this->getRequest()->isPost()) {
        $signInForm->setValues($this->getRequest()->getPost());
        if ($signInForm->isValid()) {
            $data = $signInForm->getValues();
            // authentication...
            // $result = $auth->authenticate();
            if ($result->isValid()) {
                // some actions
            }
        }
    }
    return new ViewModel([
        'signInForm' => $signInForm,
    ]);
}
```

Links
-----

- [Documentation of `zendframework/zend-inputfilter`](https://zendframework.github.io/zend-inputfilter/).
- [Documentation of `adamwathan/form`](https://github.com/adamwathan/form/blob/master/readme.md).

License
-------

zf-form is released under the BSD 3-Clause License.