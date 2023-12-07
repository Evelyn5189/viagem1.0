<?php
class Viagem{

    private ?int $id;  
    private string $tipo;
    private string $nome;
    private string $imagem;
    private float $preco;

    public function __construct(?int $id,
                            string $tipo,
                            string $nome,  
                            float $preco,
                            string $imagem
                            )
{
    $this->id = $id;
    $this->tipo = $tipo;
    $this->nome = $nome;
    $this->preco = $preco;
    $this->imagem = $imagem;
}

 /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }



    /**
     * Get the value of tipo
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }





 /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }




 /**
     * Get the value of preco
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     */
    public function setPreco(float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }




     /**
     * Get the value of imagem
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }
    public function getImagemDiretorio(): string
    {
        return "../img/".$this->imagem;
    }

    /**
     * Set the value of imagem
     */
    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;

       
    }




/*     function cadastrarviagem($codviagem, $nome, $datav, $preco, $duracao , $categoria, $img) {
        $sql = "INSERT INTO viagens (codviagem, nome, datav, preco, duracao , categoria, img) VALUES 
            (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $codviagem, $nome, $datav, $preco, $duracao , $categoria, $img);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } */
}
