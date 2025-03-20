<?php

class MetaPixelHelper
{
    private $accessToken;
    private $pixelId;
    private $apiVersion = 'v17.0';
    private $baseUrl = 'https://graph.facebook.com/';

    public function __construct()
    {
        $this->accessToken = META_ACCESS_TOKEN;
        $this->pixelId = META_PIXEL_ID;
    }

    /**
     * Envia um evento de conversão para o Meta Pixel
     * 
     * @param string $eventName Nome do evento (ex: 'Lead', 'Contact')
     * @param array $userData Dados do usuário
     * @param array $customData Dados personalizados do evento
     * @return bool
     */
    public function sendEvent($eventName, $userData = [], $customData = [])
    {
        try {
            if (empty($this->pixelId)) {
                throw new Exception("Meta Pixel ID não configurado");
            }

            $url = $this->baseUrl . $this->apiVersion . '/' . $this->pixelId . '/events';
            
            $eventData = [
                'data' => [
                    [
                        'event_name' => $eventName,
                        'event_time' => time(),
                        'action_source' => 'website',
                        'user_data' => array_merge([
                            'client_ip_address' => $_SERVER['REMOTE_ADDR'],
                            'client_user_agent' => $_SERVER['HTTP_USER_AGENT']
                        ], $userData),
                        'custom_data' => $customData
                    ]
                ],
                'access_token' => $this->accessToken
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($eventData));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode !== 200) {
                $error = json_decode($response, true);
                throw new Exception("Erro ao enviar evento para o Meta: " . ($error['error']['message'] ?? 'Erro desconhecido'));
            }

            // Registrar sucesso no log
            error_log("Evento Meta Pixel enviado com sucesso: $eventName");
            return true;

        } catch (Exception $e) {
            // Registrar erro no log
            error_log("Erro ao enviar evento Meta Pixel: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Gera um hash SHA256 de uma string
     * 
     * @param string $value
     * @return string
     */
    public function hash($value)
    {
        if (empty($value)) return '';
        return hash('sha256', strtolower(trim($value)));
    }
} 