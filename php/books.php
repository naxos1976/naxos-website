<?php
include 'connect.php'; // Σύνδεση με τη βάση

try {
    $stmt = $conn->prepare("SELECT title, author, publication_date, category FROM books");
    $stmt->execute();

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Σφάλμα ανάκτησης δεδομένων: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Βιβλιοθήκη Ναξίων - Βιβλία</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Λίστα Βιβλίων</h1>
    <?php if (!empty($books)): ?>
        <table>
            <tr>
                <th>Τίτλος</th>
                <th>Συγγραφέας</th>
                <th>Ημερομηνία Έκδοσης</th>
                <th>Κατηγορία</th>
            </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars($book['publication_date']) ?></td>
                    <td><?= htmlspecialchars($book['category']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Δεν βρέθηκαν βιβλία.</p>
    <?php endif; ?>
</body>
</html>
