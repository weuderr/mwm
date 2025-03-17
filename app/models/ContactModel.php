<?php

class ContactModel
{
    private $db;

    public function __construct()
    {
        $this->initDatabase();
    }

    private function initDatabase()
    {
        // Criar diretório do banco de dados se não existir
        $dbDir = dirname(DB_FILE);
        if (!is_dir($dbDir)) {
            mkdir($dbDir, 0777, true);
        }

        // Conectar ao banco de dados
        $this->db = new SQLite3(DB_FILE);

        // Criar tabela se não existir
        $this->db->exec('
            CREATE TABLE IF NOT EXISTS contacts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                email TEXT NOT NULL,
                telefone TEXT,
                servico TEXT NOT NULL,
                mensagem TEXT,
                data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ');
    }

    public function save($data)
    {
        $stmt = $this->db->prepare('
            INSERT INTO contacts (nome, email, telefone, servico, mensagem)
            VALUES (:nome, :email, :telefone, :servico, :mensagem)
        ');

        $stmt->bindValue(':nome', $data['nome'], SQLITE3_TEXT);
        $stmt->bindValue(':email', $data['email'], SQLITE3_TEXT);
        $stmt->bindValue(':telefone', $data['telefone'], SQLITE3_TEXT);
        $stmt->bindValue(':servico', $data['servico'], SQLITE3_TEXT);
        $stmt->bindValue(':mensagem', $data['mensagem'], SQLITE3_TEXT);

        return $stmt->execute();
    }

    public function getAll()
    {
        $result = $this->db->query('SELECT * FROM contacts ORDER BY data_envio DESC');
        $contacts = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $contacts[] = $row;
        }

        return $contacts;
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM contacts WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        return $stmt->execute();
    }
} 