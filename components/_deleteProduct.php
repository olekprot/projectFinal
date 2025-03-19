<?php
include "../components/_config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tableName = $_GET['tableName'] ?? '';
    $id = $_GET['id'] ?? '';

    if (!empty($id) && !empty($tableName)) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?");
        $databaseName = 'tiendazaya'; // Nombre de la basa de datos
        $stmt->bind_param("ss", $databaseName, $tableName);
        $stmt->execute();
        $stmt->bind_result($tableExists);
        $stmt->fetch();
        $stmt->close();

    if ($tableExists == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nombre de la tabla no es correcta!']);
        exit;
    }

        $stmt = $conn->prepare("DELETE FROM `$tableName` WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => "El elemento se eliminó correctamente de la tabla. $tableName!"]);
        } else {
            echo json_encode(['status' => 'error', 'message' => "Error al eliminar elemento:" . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => "ID de elemento o nombre de tabla no especificado."]);
    }

    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => "El metodo de solicitud no es correcto."]);
}

?>
