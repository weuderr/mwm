<?php

class ChatController extends Controller {
    private $chatModel;
    
    public function __construct() {
        parent::__construct();
        $this->chatModel = $this->loadModel('ChatModel');
    }
    
    public function saveMessage() {
        if (!$this->isPost()) {
            $this->jsonResponse(['error' => 'Método não permitido'], 405);
            return;
        }
        
        $data = [
            'user_id' => $_SESSION['user_id'] ?? null,
            'message' => $_POST['message'] ?? '',
            'type' => $_POST['type'] ?? 'user',
            'session_id' => session_id(),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        if (empty($data['message'])) {
            $this->jsonResponse(['error' => 'Mensagem não pode estar vazia'], 400);
            return;
        }
        
        try {
            $messageId = $this->chatModel->saveMessage($data);
            
            // Notificar equipe de suporte via webhook
            $this->notifySupport($data);
            
            $this->jsonResponse([
                'success' => true,
                'message_id' => $messageId
            ]);
        } catch (Exception $e) {
            $this->jsonResponse([
                'error' => 'Erro ao salvar mensagem',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    
    private function notifySupport($data) {
        // Configuração do webhook (exemplo usando Slack)
        $webhookUrl = getenv('SLACK_WEBHOOK_URL');
        
        if (!$webhookUrl) return;
        
        $message = [
            'text' => "Nova mensagem do chat\n" .
                     "Usuário: " . ($data['user_id'] ?? 'Anônimo') . "\n" .
                     "Mensagem: " . $data['message']
        ];
        
        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        
        curl_exec($ch);
        curl_close($ch);
    }
    
    public function getHistory() {
        if (!$this->isGet()) {
            $this->jsonResponse(['error' => 'Método não permitido'], 405);
            return;
        }
        
        $sessionId = session_id();
        $messages = $this->chatModel->getMessagesBySession($sessionId);
        
        $this->jsonResponse([
            'success' => true,
            'messages' => $messages
        ]);
    }
    
    private function jsonResponse($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
} 