<?php
ob_start();  // Tambahkan ini di awal file edit_pengguna.php
include '../config.php';
include '../sidebar.php';

// Cek jika session sudah dimulai, jika belum baru panggil session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pastikan pengguna sudah login dan memiliki akses admin
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

// Cek jika ada ID di URL untuk update pengguna
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Proses pembaruan data jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $role = $_POST['role'];

        // Query untuk memperbarui data pengguna
        $sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssi", $username, $role, $id);

        if ($stmt->execute()) {
            // Jika berhasil, redirect ke halaman pengguna
            header("Location: data_pengguna.php?status=sukses");
            exit();
        } else {
            echo "Gagal memperbarui data: " . $mysqli->error;
        }
    }

    // Query untuk mengambil data pengguna berdasarkan ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data pengguna
        $user = $result->fetch_assoc();
    } else {
        echo "Pengguna tidak ditemukan!";
        exit();
    }
} else {
    echo "ID pengguna tidak ditemukan!";
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="../dist/css/final.css" rel="stylesheet" />

</head>

<body>
    <section id="edit_pengguna" class="bg-slate-100 w-full dark:bg-dark">
        <div class="flex-1">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
                <h2 class="text-2xl font-bold text-gray-700">Edit Pengguna</h2>
                <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
            </header>

            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
                <form action="edit_pengguna.php?id=<?php echo $user['id']; ?>" method="POST">
                    <div class="mb-4">
                        <label for="username" class="block text-dark dark:text-white font-medium mb-2">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-dark dark:text-white font-medium mb-2">Role</label>
                        <select id="role" name="role"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                            <option value="admin" <?php if ($user['role'] == 'admin')
                                echo 'selected'; ?>>Admin</option>
                            <option value="user" <?php if ($user['role'] == 'user')
                                echo 'selected'; ?>>User</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="submit"
                            class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-80">Update</button>
                        <a href="/pendaftaran-santri/data_pengguna/data_pengguna.php"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:opacity-80">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>

<?php
$mysqli->close();
?>