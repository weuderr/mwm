<?php

class ChatModel extends Model {
    public function __construct() {
        parent::__construct();
        $this->createTable();
    }
    
    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS chat_messages (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NULL,
            message TEXT NOT NULL,
            type VARCHAR(10) NOT NULL,
            session_id VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        
        try {
            $this->db->exec($sql);
        } catch (PDOException $e) {
            error_log("Erro ao criar tabela chat_messages: " . $e->getMessage());
        }
    }
    
    public function saveMessage($data) {
        $sql = "INSERT INTO chat_messages (user_id, message, type, session_id, created_at)
                VALUES (:user_id, :message, :type, :session_id, :created_at)";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':user_id' => $data['user_id'],
                ':message' => $data['message'],
                ':type' => $data['type'],
                ':session_id' => $data['session_id'],
                ':created_at' => $data['created_at']
            ]);
            
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erro ao salvar mensagem: " . $e->getMessage());
            throw $e;
        }
    }
    
    public function getMessagesBySession($sessionId, $limit = 50) {
        $sql = "SELECT * FROM chat_messages 
                WHERE session_id = :session_id 
                ORDER BY created_at DESC 
                LIMIT :limit";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':session_id', $sessionId);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao buscar mensagens: " . $e->getMessage());
            throw $e;
        }
    }
    
    public function deleteOldMessages($days = 30) {
        $sql = "DELETE FROM chat_messages 
                WHERE created_at < datetime('now', '-' || :days || ' days')";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':days', $days, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log("Erro ao deletar mensagens antigas: " . $e->getMessage());
            throw $e;
        }
    }
} 