<?php

namespace App\Models;

if (!defined('ACCESS_ALLOWED')) {
    die('Acesso direto não permitido');
}

use App\Core\Model;
use PDO;

class Usuario extends Model
{
    public function exists(string $email): bool
    {
        // Prepara a consulta
        $query = "SELECT COUNT(*) FROM usuarios WHERE email = :email";

        // Prepara a execução
        $stmt = $this->db->prepare($query);

        // Associa o valor do email ao parâmetro :email
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);

        // Executa a consulta
        $stmt->execute();

        // Pega o número de registros encontrados
        $count = $stmt->fetchColumn();

        // Retorna verdadeiro se o número for maior que 0, falso caso contrário
        return $count > 0;
    }

    public function cadastrar(array $dados): array
    {
        // Exemplo de inserção de dados no banco de dados
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";

        // Prepara a execução
        $stmt = $this->db->prepare($query);

        // Associa os valores aos parâmetros
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':email', $dados['email']);
        $stmt->bindValue(':senha', md5($dados['nome'] . rand(111, 999) . time() . rand(111, 999),)); // Hash da senha

        // Executa a consulta
        $stmt->execute();

        // Retorna o ID do usuário inserido
        $usuario_id = $this->db->lastInsertId();

        $sql = $this->db->query("SELECT nome, email, id, senha, created_at FROM usuarios WHERE id = $usuario_id");

        return $sql->fetch();
    }

    public function login(string $email)
    {
        $query = "UPDATE usuarios SET senha = :senha WHERE email = :email";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':senha', md5($email . rand(111, 999) . time() . rand(111, 999),));
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $sql = $this->db->query("SELECT nome, email, id, senha, created_at FROM usuarios WHERE email = '$email'");
        return $sql->fetch();
    }

    public function logar(string $email, string $token): array|bool
    {
        $usuario = [];

        $sql = $this->db->prepare("SELECT id, nome, email, senha, created_at FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() <= 0) {
            $_SESSION['alert'] = [
                'campo' => '',
                'msg' => "<div class='alert alert-danger' role='alert'>Credenciais inválidas.</div>",
                'old' => ['email' => $email],
            ];
            return false;
        }

        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if ($token !== $usuario['senha']) {
            $_SESSION['alert'] = [
                'campo' => '',
                'msg' => "<div class='alert alert-danger' role='alert'>Credenciais inválidas.</div>",
                'old' => ['email' => $email],
            ];
            return false;
        }

        unset($usuario['senha']);

        return $usuario;
    }
}
