<?php
namespace App\Models;

use PDO;

class User
{
    private int $id;
    private string $email;
    private string $name;
    private string $password;
    private string $inscriptionDate;
    private int $roleID;
    private string $lastConnection;
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // GETTERS

    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getInscriptionDate(): string
    {
        return $this->inscriptionDate;
    }
    public function getRoleId(): int
    {
        return $this->roleID;
    }
    public function getLastConnection(): string
    {
        return $this->lastConnection;
    }

    public function findUserById(?int $id): bool
    {
        if (!$id) {
            return false;
        }


        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE idUsers = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        if ($user) {
            $this->id = $user["idUsers"];
            $this->name = $user["firstName"];
            $this->name = $user["lastName"];
            $this->email = $user["email"];
            $this->password = $user["password"];
            $this->roleID = $user["role"];
            $this->inscriptionDate = $user["created_at"];
        }

        return $user !== false;
    }

    public function findUserByEmail(string $email): bool
    {
        // Search a user in the db with their email
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Populate the user properties if found
        if ($user) {
            $this->id = $user["idUsers"];
            $this->name = $user["firstName"];
            $this->name = $user["lastName"];
            $this->email = $user["email"];
            $this->password = $user["password"];
            $this->roleID = $user["role"];
            $this->inscriptionDate = $user["created_at"];
        }

        // Return if we found the user
        return (bool) $user;
    }

    public function checkPass($passToCheck): bool
    {
        return !empty($this->password) && password_verify($passToCheck, $this->password);

    }

    public function setSession(): void
    {
        $_SESSION["USER_ID"] = $this->id;

        // update the lastseen date in the database
        $stmt = $this->pdo->prepare("UPDATE users = NOW() WHERE idUsers = ?");
        $stmt->execute([$this->id]);
    }

    public function isAdmin(): bool
    {
        return isset($this->roleID) ? $this->roleID === 1 : false;
    }

    public function checkAdmin(): void
    {
        if (!$this->isAdmin()) {
            header("Location: /");
            exit;
        }
    }

    public static function checkAdminNew(PDO $pdo, ?int $id): ?User
    {
        $user = new User($pdo);
        $user->findUserById($id);

        if (!$user->isAdmin()) {
            header("Location: /");
            exit;
        }


        return $user;
    }

    public static function create(PDO $pdo, string $firstName, string $lastName, string $email, string $password): bool
    {
        $stmt = $pdo->prepare(" INSERT INTO
                                    users (firstName, lastName, email, password, role, created_at)
                                VALUES
                                    (:email, :firstName, :lastName, :password, NOW(), 2)");
        $success = $stmt->execute([
            "email" => $email,
            "firstName" => $firstName,
            "lastName" => $lastName,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return $success;
    }

    public static function getAllUsers(PDO $pdo): array
    {
        $stmt = $pdo->prepare(" SELECT 
                                    idUsers,
                                    email,
                                    firstName,
                                    lastName,
                                    password,
                                    RoleID,
                                    created_at
                                FROM 
                                    users");
        $stmt->execute();
        $results = $stmt->fetchAll();

        $users = [];

        foreach ($results as $user) {
            $newUser = new User($pdo);

            $newUser->id = $user["idUsers"];
            $newUser->email = $user["email"];
            $newUser->name = $user["name"];
            $newUser->password = $user["password"];
            $newUser->roleID = $user["roleID"];
            $newUser->inscriptionDate = $user["created_at"];

            $users[] = $newUser;
        }

        return $users;
    }
}