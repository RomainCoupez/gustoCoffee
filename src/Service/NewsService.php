<?php

namespace App\Service;

use App\Entity\News;
use App\Repository\NewsRepository;
use Doctrine\ORM\EntityManagerInterface;

final class NewsService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * NewsService constructor.
     * @param EntityManagerInterface 		$em
     * @param NewsRepository 			$repoNews
     */
    public function __construct(EntityManagerInterface $em, NewsRepository $repoNews)
    {
        $this->em = $em;
        $this->repoNews = $repoNews;
    }

    /**
     * @param string $message
     * @return News
     */
    public function createNews(string $message): News
    {
        $news = new News();
        $this->em->persist($news);
        $this->em->flush();
        return $news;
    }

    /**
     * @return News[]
     */
    public function getAll(): array
    {
        return $this->repoNews->findBy([], ['createdAt' => 'DESC']);
    }
}
