<?php

namespace App\Presenters;
use App\ArticleModule\Entity\Author;
use App\ArticleModule\Service\ArticleService;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class HomepagePresenter extends BasePresenter {

    /** @var ArticleService @inject */
    public $articleService;


    /** @var \ArticleForm @inject */
    public $articleFormFactory;
	public function renderDefault()
	{
		$this->template->articles = $this->articleService->getArticles();
	}

    public function afterRender()
    {

        //ajaxing flash messages
        if ($this->isAjax() && $this->hasFlashSession())
            $this->redrawControl('flashes');
    }

	public function createComponentArticleForm()
    {
        //create an Article form with AJAX class
        $form = $this->articleFormFactory->createForm(1);

        //on success, call articleFormSucceded function
        $form->onSuccess[]= [$this, 'articleFormSucceded'];
        return $form;
    }
    public function articleFormSucceded($form, array $values){
        //creates new log and stream if posting form succeeded
        $log = new Logger('articles');
        //logs into the streamhandler stream
        $log->pushHandler(new StreamHandler('..\..\Doctrine\log\articles.log', Logger::INFO));
        $log->info("New article created",$values);


        $this->flashMessage("New article has been created", 'success');
	    //creates an article with values given in the form
        $this->articleService->createArticle($values);

        //if class has ajax, redraw snippets
        if ($this->isAjax()){
            $this->redrawControl('list');
            $this->redrawControl('form');
            //reset values in the form
            $form->setValues(array(), True);
        }
        //else redirects to this page
        else {
            $this->redirect('this');
        }






    }
}
