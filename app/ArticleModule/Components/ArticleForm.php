<?php
use Nette\Application\UI\Form;
use Nette\Application\UI\Control;


class ArticleForm extends Control
{
    public function createForm($ajax){
        //creates a new Form
        $form = new Form;

        //AJAX
        if($ajax){
            $form -> getElementPrototype()->setAttribute('class', 'ajax');
        }

        //form text fields
        $form->addText('title', 'Title:')
            ->setRequired();
        $form->addText( 'name', 'Name:');
        $form->addEmail('email', 'Email address: ')->setDefaultValue('@')
            ->setRequired();
        $form->addTextArea('content', 'Content:')
            ->setRequired();
        $form->addSubmit('send', 'Save & publish')
            ->setAttribute('class', 'btn btn-default');

        return $form;






    }




}