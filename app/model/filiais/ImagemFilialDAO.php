<?php

namespace app\model\filiais;

use app\model\Conexao;

class ImagemFilialDAO
{
    public function createImagemFilial(ImagemFilial $imagem_filial)
    {
        $sql = "INSERT INTO imagem_filial(nome, filial_id) VALUES(:nome, :filial_id)";

        $stmt = Conexao::getInstance()->prepare($sql);

        $stmt->bindValue(':nome', $imagem_filial->getNome());
        $stmt->bindValue(':filial_id', $imagem_filial->getFilialId());

        $stmt->execute();
    }

    public function deleteImagemFilial($id)
    {
        $sql = "DELETE FROM imagem_filial WHERE id = {$id}";
        $stmt = Conexao::getInstance()->prepare($sql);
        $stmt->execute();
    }
}