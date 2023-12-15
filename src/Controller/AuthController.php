<?php

// src/Controller/AuthController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Vérification des informations d'identification ici
        if ($data['username'] === 'admin' && $data['password'] === 'password') {
            // Générer le token JWT
            $token = $this->get('lexik_jwt_authentication.jwt_manager')->create(['username' => $data['username']]);

            return new JsonResponse(['token' => $token]);
        }

        return new JsonResponse(['error' => 'Invalid credentials'], 401);
    }
}
