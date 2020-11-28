zf-form
=======

[![Latest Stable Version](https://poser.pugx.org/bupy7/zf-form/v/stable)](https://packagist.org/packages/bupy7/zf-form)
[![Total Downloads](https://poser.pugx.org/bupy7/zf-form/downloads)](https://packagist.org/packages/bupy7/zf-form)
[![Latest Unstable Version](https://poser.pugx.org/bupy7/zf-form/v/unstable)](https://packagist.org/packages/bupy7/zf-form)
[![License](https://poser.pugx.org/bupy7/zf-form/license)](https://packagist.org/packages/bupy7/zf-form)
[![Build Status](https://travis-ci.org/bupy7/zf-form.svg?branch=master)](https://travis-ci.org/bupy7/zf-form)
[![Coverage Status](https://coveralls.io/repos/github/bupy7/zf-form/badge.svg?branch=master)](https://coveralls.io/github/bupy7/zf-form?branch=master)

Simple and powerful form with [`laminas/laminas-inputfilter`](https://github.com/laminas/laminas-inputfilter)
and [`bupy7/php-html-form`](https://github.com/bupy7/php-html-form).

> If you want to use only form input filter I recomend to you [php-input-filter](https://github.com/bupy7/php-input-filter) instead. In the future this package (`zf-form`) will work together with `php-input-filter`.

Installation
------------

The preferred way to install this extension is through composer.

Either run

```
$ php composer.phar require bupy7/zf-form "*"
```

or add

```
"bupy7/zf-form": "*"
```

to the require section of your composer.json file.

Usage
-----

Form:

```php
// module/Application/src/Form/SignInForm.php

use Bupy7\Form\FormAbstract;

class SignInForm extends FormAbstract
{
    /**
     * @var string 
     */
    public $email;
    /**
     * @var string 
     */
    public $password;

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
// module/Application/view/auth/signin.phtml

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
// module/Application/src/Controller/AuthController.php

use Application/Form/SignInForm;

public function signinAction()
{
    $signInForm = new SignInForm;
    if ($this->getRequest()->isPost()) {
        $signInForm->setValues($this->getRequest()->getPost());
        if ($signInForm->isValid()) {
            // authentication...
            // $auth->setLogin($signInForm->email)
            // $auth->setPassword($signInForm->password);
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

Uses scenarios
--------------

By default using `FormAbstract::DEFAULT_SCENARIO` but you can use your customs one:

```php
// module/Application/src/Form/SignInForm.php

use Bupy7\Form\FormAbstract;

class SignInForm extends FormAbstract
{
    const SCENARIO_PASSWORD = 2;

    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;

    protected function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_PASSWORD] = [
            'password',
        ];
        return $scenarios;
    }

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
                'filters' => [
                    [
                        'name' => 'StringTrim',
                    ]
                ],
            ],
        ];
    }
}
```

Controller:

```php
// DEFAULT scenario
$signInForm = new SignInForm;
$signInForm->email = 'test@gmail.com';
$signInForm->password = '12q34e56t78';
if ($signInForm->isValid()) {
    // do something
}

// or PASSWORD scenario
$signInForm = new SignInForm;
$signInForm->setScenario(SignInForm::SCENARIO_PASSWORD);
$signInForm->password = '12q34e56t78';
if ($signInForm->isValid()) {
    // do something
}
```

Configuration for `ZF-Commons/ZfcTwig`
--------------------------------------

```php
// config/autoload/twig.global.php

use Bupy7\Form\View\Helper\FormBuilderHelper;
use Bupy7\Form\View\Helper\FormBuilderHelperFactory;

return [
    'zfctwig' => [
        'helper_manager' => [
            'factories' => [
                FormBuilderHelper::class => FormBuilderHelperFactory::class,
            ],
            'shared' => [
                'formBuilder' => false,
                FormBuilderHelper::class => false,
            ],
            'aliases' => [
                'formBuilder' => FormBuilderHelper::class,
            ],
        ],
    ],
];
```

Links
-----

- [Documentation of `laminas/laminas-inputfilter`](https://laminas.github.io/laminas-inputfilter/).
- [Documentation of `bupy7/php-html-form`](https://github.com/bupy7/php-html-form/blob/master/README.md).

License
-------

zf-form is released under the BSD 3-Clause License.
