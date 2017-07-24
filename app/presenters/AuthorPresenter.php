<?php

namespace App\Presenters;
use App\ArticleModule\Entity\Author;
use App\ArticleModule\Service\ArticleService;
use App\ArticleModule\Service\AuthorService;


class AuthorPresenter extends BasePresenter
{
    /** @var AuthorService @inject */
    public $authorService;


    public function renderShowAuthor($name)
    {
        $this->template->author = $this->authorService->getSingleAuthor($name);

    }



}