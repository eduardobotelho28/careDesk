<?php
require_once '../Models/ConsultationModel.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new ConsultationsController();
$controller->processRequest();

class ConsultationsController {

    public $model;

    public function __construct() {
        $this->model = new ConsultationModel();
    }

    // Método que faz o roteamento
    public function processRequest() {

        $action = $_GET['action'] ?? null;

        switch ($action) {
            case 'register':
                $this->register();
                break;

            case 'update':
                $this->update();
                break;

            case 'delete':
                $this->delete();
                break;

            case 'fetchAll':
                $this->fetchAll();
                break;

            case 'fetchById':
                $this->fetchById();
                break;

            default:
                http_response_code(404);
                die(json_encode('Ação não existente no controller'));
                break;
        }
    }

    private function register() {

        $this->valid_method('POST');

        $data = $_POST;
        $data = $this->sanitize_data($data);
        $errors = $this->valid_input_data($data);

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => 'false', 'errors' => $errors]);
            exit;
        }

        $this->model->register($data);

        echo json_encode(['success' => 'true']);
        exit;
    }

    private function update() {

        $this->valid_method('PUT');

        // Recebe dados JSON do corpo da requisição
        $data = json_decode(file_get_contents('php://input'), true);
        $data = $this->sanitize_data($data);

        $errors = $this->valid_input_data($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => 'false', 'errors' => $errors]);
            exit;
        }

        $this->model->update($data);

        echo json_encode(['success' => 'true']);
        exit;
    }

    private function delete() {

        $this->valid_method('DELETE');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            die(json_encode(['success' => 'false', 'message' => 'ID é obrigatório para exclusão']));
        }

        $this->model->delete($id);

        echo json_encode(['success' => 'true']);
        exit;
    }

    private function fetchAll() {

        $this->valid_method('GET');

        $consultations = $this->model->fetchAll();

        echo json_encode($consultations);
        exit;
    }

    private function fetchById() {

        $this->valid_method('GET');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            die(json_encode(['success' => 'false', 'message' => 'ID é obrigatório']));
        }

        $consultation = $this->model->fetchById($id);

        if (!$consultation) {
            http_response_code(404);
            die(json_encode(['success' => 'false', 'message' => 'Consulta não encontrada']));
        }

        echo json_encode($consultation);
        exit;
    }

    private function valid_input_data($data) {
        $errors = [];

        // Verifica se algum campo do formulário veio vazio (atualmente, todos os campos são obrigatórios)
        foreach ($data as $key => $value) {
            if ($value == '' || $value == null) {
                $errors[] = "Campo $key é obrigatório";
            }
        }

        return $errors;
    }

    private function sanitize_data($data) {
        $sanitized = [];

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                // Remove espaços em excesso no início/fim e caracteres HTML especiais
                $sanitized[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            } elseif (is_numeric($value)) {
                // Garante que números fiquem no formato correto
                $sanitized[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            } else {
                // Para outros tipos de dados, mantém o valor como está
                $sanitized[$key] = $value;
            }
        }

        return $sanitized;
    }

    private function valid_method($method) {
        if ($_SERVER['REQUEST_METHOD'] != $method) {
            die(json_encode('Método não permitido'));
        }
    }
}
