<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit;
}

include 'konets.php';

$limit = 13; 

$totalDataQuery = $conn->query("SELECT COUNT(*) FROM inhuman");
$totalData = $totalDataQuery->fetchColumn();
$totalPages = ceil($totalData / $limit);

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit; 

//sorting
$columns = array('ID', 'Nama', 'NIK');
$sort = isset($_GET['sort']) && in_array($_GET['sort'], $columns) ? $_GET['sort'] : 'ID';
$order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';

$stmt = $conn->prepare("SELECT * FROM inhuman ORDER BY $sort $order LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$inhumanRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M O N O L I T H</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            justify-content: center;
            margin: auto;
            border-radius: 30px;
            background-color: white;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #323779;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #323779;
            color: white;
        }
        th a {
            text-decoration: none;
            color: white;
        }
        th a:hover {
            color: #323779;
            background-color: white;
        }
        table tr:nth-child(odd) {
        background-color: #cccccc;
        border-radius: 20px;
        }
        .morgenasi {
            margin-top: 20px;
            text-align: center;
        }
        .morgenasi a {
            margin: 2px;
            padding: 8px 12px;
            background-color: #345771;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .morgenasi a:hover {
            background-color: #345771;
        }
        .morgenasi strong {
            padding: 8px 12px;
            background-color: #333;
            color: white;
            font-size: 16px;
        }
    .button {
        justify-content: left;
        margin: 20px 0;
    }
    .button a {
        margin: 2px;
            padding: 8px 12px;
            background-color: #345771;
            color: white;
            text-decoration: none;
            font-size: 16px;
    }
    </style>
</head>
<body>
    <h1>Human Resources</h1>
    <div class="button"><a href="logout.php">LOGOUT</a>
    </div>
    <table>
        <thead>
            <tr>
                <th><a href="index.php?sort=ID&order=<?php echo (isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">ID</a></th>
                <th><a href="index.php?sort=Nama&order=<?php echo (isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">Nama</a></th>
                <th><a href="index.php?sort=NIK&order=<?php echo (isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'; ?>">NIK</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inhumanRecords as $row): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Nama']; ?></td>
                    <td><?php echo $row['nik']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php   
    echo '<div class="morgenasi">';
    // b4math
    if ($page > 1) {
        echo '<a href="index.php?page=' . ($page - 1) . '">&lt;</a>';
    }
    // exist
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            echo '<strong>' . $i . '</strong>';
        } else {
            echo '<a href="index.php?page=' . $i . '">' . $i . '</a>';        
        }
    }
    // aftermath
    if ($page < $totalPages) {
        echo '<a href="index.php?page=' . ($page + 1) . '">&gt;</a>';
    }    
    echo '</div>';  
    ?>
</body>
</html>
