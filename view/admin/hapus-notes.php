<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['noteId'])) {
        $noteId = $_POST['noteId'];


        $query = "DELETE FROM catatan WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $noteId);

        if ($stmt->execute()) {
            echo json_encode(array("status" => "success", "message" => "Produk berhasil dihapus."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Gagal menghapus produk."));
        }

        $stmt->close();
    } else {
        echo json_encode(array("status" => "error", "message" => "Parameter productId tidak ditemukan."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Metode permintaan tidak valid."));
}

$conn->close();
?>
