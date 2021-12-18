<?php

declare(strict_types=1);

namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Security\AuthenticationException;
use stdClass;

class IndexPresenter extends Presenter
{
    protected function createComponentSignInForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired('Prosím vyplňte své uživatelské jméno.');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím vyplňte své heslo.');

        $form->addSubmit('send', 'Přihlásit');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];

        return $form;
    }

    public function signInFormSucceeded(Form $form, stdClass $values): void
    {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Index:');
        } catch (AuthenticationException $exception) {
            $form->addError('Wrong credentials.');
        }
    }

    public function renderDefault(): void
    {
        $this->template->contacts = ['a', 'b'];
        $this->template->setFile(__DIR__ . '/templates/Homepage/default.latte');
    }
}