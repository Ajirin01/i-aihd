<?php
include_once 'config.php';

if (isset($_GET['parent_id']) && isset($_GET['offset'])) {
    $parent_id = intval($_GET['parent_id']);
    $offset = intval($_GET['offset']);
    $limit = 3;

    $query = "SELECT * FROM comments WHERE parent_id = ? ORDER BY created_at DESC LIMIT ?, ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iii", $parent_id, $offset, $limit);
    $stmt->execute();
    $replies = $stmt->get_result();

    while ($reply = $replies->fetch_assoc()) {
        echo '<li class="comment">
                <div class="vcard bio">
                    <img src="images/person_5.jpg" alt="Commenter Image">
                </div>
                <div class="comment-body">
                    <h3>'.htmlspecialchars($reply['name']).'</h3>
                    <div class="meta">'.date('F j, Y \a\t g:i A', strtotime($reply['created_at'])).'</div>
                    <p>'.nl2br(htmlspecialchars($reply['message'])).'</p>
                    <p><a href="#" class="reply" onclick="event.preventDefault(); showReplyForm('.$reply['id'].')">Reply</a></p>
                </div>
              </li>';
    }
}
?>
