<?php
namespace app\model\filiais;

use app\model\Conexao;
use app\model\filiais\Filial;

class FilialDAO
{
    public function createFilial(Filial $filial)
    {
        $sql = "INSERT INTO filial(telefone, uf, cidade, bairro, rua, numero) VALUES(:telefone, :uf, :cidade, :bairro, :rua, :numero)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':telefone', $filial->getTelefone());
        $stmt->bindValue(':uf', $filial->getUf());
        $stmt->bindValue(':cidade', $filial->getCidade());
        $stmt->bindValue(':bairro', $filial->getBairro());
        $stmt->bindValue(':rua', $filial->getRua());
        $stmt->bindValue(':numero', $filial->getNumero());

        $stmt->execute();
    }

    public function readFilial()
    {
        $sql = "SELECT * FROM filial";

        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            echo "Nenhuma filial foi cadastrada :(";
        }
    }

    public function filtrarFilial($id)
    {
        $sql = "SELECT * FROM filial WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return "Filial não encontrada :(";
        }
    }

    public function updateFilial(Filial $filial)
    {
        $sql = "UPDATE filial SET telefone = :telefone, uf = :uf, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':telefone', $filial->getTelefone());
        $stmt->bindValue(':uf', $filial->getUf());
        $stmt->bindValue(':cidade', $filial->getCidade());
        $stmt->bindValue(':bairro', $filial->getBairro());
        $stmt->bindValue(':rua', $filial->getRua());
        $stmt->bindValue(':numero', $filial->getNumero());
        $stmt->bindValue(':id', $filial->getId());

        $stmt->execute();
    }

    public function deleteFilial($id)
    {
        $sql = "DELETE FROM filial WHERE id = :id";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}