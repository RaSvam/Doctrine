<?php

namespace App\ArticleModule\Service;
use Nette;
use Kdyby\Doctrine\EntityManager;
use App\ArticleModule\Entity\Author;


class AuthorService
{
    use Nette\SmartObject;

    /**
     * @var \Kdyby\Doctrine\EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSingleAuthor($name)
    {
        $author = $this->entityManager->getRepository(Author::class)->findOneBy(array('name'=>$name));
        return $author;

    }


}