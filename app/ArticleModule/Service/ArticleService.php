<?php
namespace App\ArticleModule\Service;
use Nette;
use Kdyby\Doctrine\EntityManager;
use App\ArticleModule\Entity\Article;
use App\ArticleModule\Entity\Author;


class ArticleService {

    use Nette\SmartObject;

    /**
     * @var \Kdyby\Doctrine\EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getArticles(){

        $articles = $this->entityManager->getRepository(Article::class);
        return $articles->findBy(array(),array('timestamp'=>'DESC'));

    }

    public function createArticle($values){
        $article = new Article();
        $author = $this->entityManager->getRepository(Author::class)->findBy(array('name' => $values['name']));
        if (!$author) {
            $author = new Author();
            $author->setName($values['name']);
            $article->setAuthor($author);
            $this->entityManager->persist($author);
            $this->entityManager->flush();

        }

        $article->setTitle($values['title']);
        $article->setTimestamp(new \DateTime("now"));
        $article->setContent($values['content']);
        $article->setEmail($values['email']);
        $this->entityManager->persist($article);
        $this->entityManager->flush();
        return $article;

    }



}