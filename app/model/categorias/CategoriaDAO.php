<?php

namespace app\model\categorias;

use app\model\Conexao;
use PDO;

class CategoriaDAO
{
    public function create(Categoria $categoria)
    {
        $sql = "INSERT INTO categoria(nome, icone) VALUES(:nome, :icone)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':icone', $categoria->getIcone());

        $stmt->execute();
    }

    public function read()
    {
        $sql = "SELECT * FROM categoria";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "Nada encontrado :(";
        }
    }

    public function update(Categoria $categoria)
    {
        $sql = "UPDATE categoria SET nome = :nome, icone = :icone WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':icone', $categoria->getIcone());

        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categoria WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}