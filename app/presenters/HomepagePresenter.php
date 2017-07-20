<?php

namespace App\Presenters;
use App\ArticleModule\Service\ArticleService;

class HomepagePresenter extends BasePresenter {

    /** @var ArticleService @inject */
    public $articleService;

    /** @var \ArticleForm @inject */
    public $articleFormFactory;
	public function renderDefault()
	{
		$this->template->articles = $this->articleService->getArticles();
	}

	public function createComponentArticleForm()
    {
        $form = $this->articleFormFactory->createForm(1);
        $form->onSuccess[]= [$this, 'articleFormSucceded'];
        return $form;
    }
    public function articleFormSucceded($form, array $values){

	    $this->articleService->createArticle($values);




    }
}
