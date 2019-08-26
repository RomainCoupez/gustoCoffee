<?php

namespace App\Controller;

use App\Service\NewsService;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiNewsController
 * @package App\Controller
 */
final class ApiNewsController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var NewsService */
    private $newsService;

    /**
     * ApiNewsController constructor.
     * @param SerializerInterface $serializer
     * @param NewsService $newsService
     */
    public function __construct(SerializerInterface $serializer, NewsService $newsService)
    {
        $this->serializer = $serializer;
        $this->newsService = $newsService;
    }

    /**
     * @Rest\Post("/api/news/create", name="createNews")
     * @param Request $request
     * @return JsonResponse
     * @IsGranted("ROLE_ADMIN")
     */
    public function create(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        $postEntity = $this->newsService->createNews($message);
        $data = $this->serializer->serialize($postEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/newss", name="getAllNews")
     * @return JsonResponse
     */
    public function getAlls(): JsonResponse
    {
        $postEntities = $this->newsService->getAll();
        $data = $this->serializer->serialize($postEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}