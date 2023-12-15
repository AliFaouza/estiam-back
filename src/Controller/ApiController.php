<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Serializer\SerializerInterface;

use App\Document\Hygiène;

class ApiController extends AbstractController
{
    private $documentManager;
    private $serializer;

    public function __construct(DocumentManager $documentManager, SerializerInterface $serializer) {
    $this->documentManager = $documentManager;
    $this->Serializer = $serializer;
    }

     /**
     * 
     * Récupère tous les enregistrements
     * 
     * @return Response
     * @api
     */    

   #[Route('/hygiène', name: 'controle_all', methods:['GET'])]
    public function all(): Response
    {
        $hygiène = $this->documentManager->getRepository(Hygiène::class)->findAll();
        return $this->json($hygiène);
    }

    #[Route('/hygiène/{id}', name: 'controle_id', methods:['GET'])]
    public function getById($id): Response {
        $hygiène = $this->documentManager->getRepository(Hygiène::class)->find($id);
        
        if ($hygiène) {
            return $this->json($hygiène);
        } else {
            return $this->json(["error" => "Hygiène was not found by id:" . $id], 404);
        }
    }

    #[Route('/hygiène', name: 'controle_create', methods:['POST'])]
    public function create(Request $request): Response {
        $hygiène = $this->serializer->deserialize($request->getContent(), Hygiène::class, 'json');

        $this->documentManager->persist($hygiène);
        $this->documentManager->flush();

        return $this->json([], 201, ["Location" => "/api/" . $hygiène->getId()]);
    }

    #[Route('/hygiène/{id}', name: 'controle_update', methods:['PUT'])]
    public function update(Request $request, $id): Response {
        
        $hygiène = $this->documentManager->getRepository(Hygiène::class)->find($id);
        
        if (!$hygiène) {
            return $this->json(["error" => "Hygiène was not found by id:" . $id], 404);
        }

        $arrayHygièneU = json_decode($request->getContent(),true);
        $arrayHygiène = json_decode($this->serializer->serialize($hygiène, 'json'),true);
        
        $documentU = $this->serializer->deserialize(
                json_encode(array_replace_recursive($arrayHygiène,$arrayHygièneU)),
                Hygiène::class, 'json');

        $this->documentManager->merge($documentU);
        $this->documentManager->flush();

        return $this->json([], 204);
    }

    #[Route('/hygiène/{id}', name: 'controle_delete', methods:['DELETE'])]
    public function deleteById($id): Response {
        $hygiène = $this->documentManager->getRepository(Hygiène::class)->find($id);
        
        if ($hygiène) {
            $this->documentManager->remove($hygiène);
            $this->documentManager->flush();
            return $this->json([], 204);
        } else {
            return $this->json(["error" => "Hygiène was not found by id:" . $id], 404);
        }
    }
    
    #[Route('/hygiène/{filter}/{value}', name: 'controle_filter', methods:['GET'])]
    public function filter($filter,$value): Response {
        $hygiène = $this->documentManager->getRepository(Hygiène::class)->getHygièneByEval_sanitaire($filter,$value);
        return $this->json($hygiène);
    }
    /**
     * @param Request $request
     * @return Response
     */

        #[Route('/hello', name: 'hello', methods:['GET'])]
    public function sayHello(Request $request): Response
    {
//      L’opérateur fusion null ?? ressemble dans sa syntaxe et dans son fonctionnement à l’opérateur ternaire.
//      si get('name') est null alors défini Symfony par défaut
        $name = $request->get('name') ?? 'Symfony';
//        $data = ['message' => 'hello '.$name];
        $data = Salutation::of('Hello '.$name);

//        return new JsonResponse($data, 200, [], true);
        return $this->json($data);
    }
    
}
