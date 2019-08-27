<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", requirements={"vueRouting"="^(?!api|_(profiler|wdt)).*"}, name="index")
     * @return Response
     * @throws JsonException
     */
    public function indexAction(): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        return $this->render('base.html.twig', [
            'isAuthenticated'   => json_encode(!empty($user)),
            'roles'             => json_encode(!empty($user) ? $user->getRoles() : []),
        ]);
    }

    private function renderJs()
    {
        $renderer_source = file_get_contents(__DIR__ . '/../../node_modules/vue-server-renderer/basic.js');
        $app_source = file_get_contents(__DIR__ . '/../../public/build/entry-server.js');
        $v8 = new \V8Js();
        ob_start();
        $v8->executeString('var process = { env: { VUE_ENV: "server", NODE_ENV: "production" }}; this.global = { process: process };');
        $v8->executeString($renderer_source);
        $v8->executeString($app_source);
        return ob_get_clean();
    }
}