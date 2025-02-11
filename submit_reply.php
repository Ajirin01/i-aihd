<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $parent_id = $_POST['parent_id'];

    // Prepare the query
    $query = "INSERT INTO comments (parent_id, message, name, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("issi", $parent_id, $message, $name, $user_id);
    $stmt->execute();

    // Return the new reply's HTML
    $reply_id = $stmt->insert_id;
    echo '<li class="comment">
            <div class="vcard bio">
                <img src="images/person_5.jpg" alt="Commenter Image">
            </div>
            <div class="comment-body">
                <p>' . nl2br(htmlspecialchars($message)) . '</p>
            </div>
        </li>';
}
?>
