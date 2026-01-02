<?php

class Autan
{
    private string $adminEmail = "admin@senvehicule.com";
    private string $adminPassword = "123456";

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    
    public function login(string $email, string $password): bool
    {
        if ($email === $this->adminEmail && $password === $this->adminPassword) {

            session_regenerate_id(true);
            $_SESSION['admin'] = true;
            $_SESSION['admin_email'] = $this->adminEmail;

            return true;
        }
        return false;
    }

  
    public function check(): void
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: login.php");
            exit;
        }
    }

 
    public function logout(): void
    {
        session_destroy();
        header("Location: ./connexion.php");
        exit;
    }
}
