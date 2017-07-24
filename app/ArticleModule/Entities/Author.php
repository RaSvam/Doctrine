<?php
namespace App\ArticleModule\Entity;
use Doctrine\ORM\Mapping as ORM;
use \Ramsey\Uuid\Uuid;


/**
 * @ORM\Entity
 * @ORM\Table(name="authors")
 */

class Author
{

    /**
     * @var \Ramsey\Uuid\Uuid
     *
     * @ORM\Id
     * @ORM\Column(type="uuid")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected $id;

    /**
     * @ORM\OneToMany(
     *     targetEntity="Article",
     *     mappedBy="authors"
     * )
     */
    protected $articles;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @return mixed
     */

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param mixed $articles
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Uuid
     */
    public function getId()
    {
        return $this->id;
    }






}