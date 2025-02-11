<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $publication_id = $_POST['publication_id'];

    // Prepare the query
    $query = "INSERT INTO comments (publication_id, name, message) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iss", $publication_id, $name, $message);
    $stmt->execute();

    // Return the new comment's HTML
    $comment_id = $stmt->insert_id;
    // echo '<li class="comment" id="comment-' . $comment_id . '">
    //         <div class="vcard bio">
    //             <img src="images/person_2.jpg" alt="Commenter Image">
    //         </div>
    //         <div class="comment-body">
    //             <h3>' . htmlspecialchars($name) . '</h3>
    //             <div class="meta">' . date('F j, Y \a\t g:i A') . '</div>
    //             <p>' . nl2br(htmlspecialchars($message)) . '</p>
    //         </div>
    //     </li>';
}
?>
