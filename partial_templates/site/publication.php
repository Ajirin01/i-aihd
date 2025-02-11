<?php
include_once 'config.php';

// Get the publication ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the publication from the database
$query = "SELECT * FROM publications WHERE id = $id";
$result = $db->query($query);

// Check if publication exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Publication not found.");
}

// Fetch comments for the publication
// $comment_query = "SELECT * FROM comments WHERE publication_id = ? AND parent_id IS NULL ORDER BY created_at DESC";
$comment_query = "SELECT * FROM comments WHERE publication_id = ? AND parent_id IS NULL ORDER BY created_at DESC LIMIT 5";

$comment_stmt = $db->prepare($comment_query);
$comment_stmt->bind_param("i", $id);
$comment_stmt->execute();
$comments = $comment_stmt->get_result();

if(isset($_SESSION['user'])){
    $user = json_decode($_SESSION['user']);
}


function fetchReplies($db, $parent_id)
{
    $reply_query = "SELECT * FROM comments WHERE parent_id = ? ORDER BY created_at DESC";
    $reply_stmt = $db->prepare($reply_query);
    $reply_stmt->bind_param("i", $parent_id);
    $reply_stmt->execute();
    $replies = $reply_stmt->get_result();

    if ($replies->num_rows > 0) {
        echo '<ul class="children" id="replies-'.$parent_id.'" style="display: none;">';
        while ($reply = $replies->fetch_assoc()) {
            ?>
            <li class="comment">
                <div class="vcard bio">
                    <img src="images/person_5.jpg" alt="Commenter Image">
                </div>
                <div class="comment-body">
                    <h3><?php echo htmlspecialchars($reply['name']); ?></h3>
                    <div class="meta"><?php echo date('F j, Y \a\t g:i A', strtotime($reply['created_at'])); ?></div>
                    <p><?php echo nl2br(htmlspecialchars($reply['message'])); ?></p>
                    <p><a href="#" class="reply" onclick="event.preventDefault(); showReplyForm(<?php echo $reply['id']; ?>)">Reply</a></p>

                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="reply-form" id="reply-form-<?php echo $reply['id']; ?>" style="display:none;">
                            <form action="javascript:void(0)" method="POST" class="reply-form" onsubmit="submitReply(<?php echo $reply['id']; ?>)">
                                <input type="hidden" name="parent_id" value="<?php echo $reply['id']; ?>">
                                <div class="form-group">
                                    <label for="reply-message">Message</label>
                                    <textarea name="message" id="reply-message-<?php echo $reply['id']; ?>" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Reply" class="btn btn-primary btn-md text-white">
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                    <!-- Recursively fetch and display replies -->
                    <?php fetchReplies($db, $reply['id']); ?>
                </div>
            </li>
            <?php
        }
        echo '</ul>';
        echo '<button class="btn btn-sm btn-link toggle-replies" data-target="replies-'.$parent_id.'" onclick="toggleReplies(this)">Show Replies</button>';
    }
}


?>

<div class="ftco-blocks-cover-1">
    <div class="ftco-cover-1 overlay" style="background-image: url('assets/images/publication/<?php echo $row['photo']; ?>')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <span class="d-block mb-3 text-white"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></span>
                    <h1 class="mb-4 text-cursive h1"><?php echo $row['title']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-9 blog-content">
                <p class="lead"><?php echo $row['intro']; ?></p>
                <p><?php echo nl2br($row['body']); ?></p>

                <div class="pt-5">
                    <h3 class="mb-5"><?php echo $comments->num_rows; ?> Comments</h3>
                    <ul class="comment-list" id="comment-list">
                        <input type="hidden" name="username" id="username" value="<?= $user->name ?>">
                        <input type="hidden" name="userId" id="userId" value="<?= $user->id ?>">

                        <?php while ($comment = $comments->fetch_assoc()): ?>
                            <li class="comment" id="comment-<?php echo $comment['id']; ?>">
                                <div class="vcard bio">
                                    <img src="images/person_2.jpg" alt="Commenter Image">
                                </div>
                                <div class="comment-body">
                                    <h3><?php echo htmlspecialchars($comment['name']); ?></h3>
                                    <div class="meta"><?php echo date('F j, Y \a\t g:i A', strtotime($comment['created_at'])); ?></div>
                                    <p><?php echo nl2br(htmlspecialchars($comment['message'])); ?></p>
                                    <p><a href="#" class="reply" onclick="event.preventDefault(); showReplyForm(<?php echo $comment['id']; ?>)">Reply</a></p>

                                    <?php if (isset($_SESSION['user'])): ?>
                                        <div class="reply-form" id="reply-form-<?php echo $comment['id']; ?>" style="display:none;">
                                            <form action="javascript:void(0)" method="POST" class="reply-form" onsubmit="submitReply(<?php echo $comment['id']; ?>)">
                                                <input type="hidden" name="parent_id" value="<?php echo $comment['id']; ?>">
                                                <div class="form-group">
                                                    <label for="reply-message">Message</label>
                                                    <textarea name="message" id="reply-message-<?php echo $comment['id']; ?>" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Post Reply" class="btn btn-primary btn-md text-white">
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Fetch replies recursively -->
                                    <?php fetchReplies($db, $comment['id']); ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>


                    <!-- Comment form (only visible if logged in) -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php $user = json_decode($_SESSION['user']); ?>
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="javascript:void(0)" method="POST" class="comment-form" onsubmit="submitComment()">
                                <div class="form-group" style="display: none">
                                    <input type="text" value="<?php echo $user->name; ?>" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                                </div>
                            </form>
                        </div>
                    <?php else: ?>
                        <p>You must be logged in to comment. <a href="/login">Login here</a></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<script>
// Toggle reply form visibility
function showReplyForm(commentId) {
    var form = document.getElementById('reply-form-' + commentId);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

// Submit the comment via AJAX
function submitComment() {
    var name = document.getElementById('name').value;
    var message = document.getElementById('message').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_comment.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            location.reload();
        }
    };
    xhr.send('name=' + name + '&message=' + message + '&publication_id=<?php echo $id; ?>');
}

// Submit reply via AJAX
function submitReply(commentId) {
    var message = document.getElementById('reply-message-' + commentId).value;
    var name = document.getElementById('username').value;
    var userId = document.getElementById('userId').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_reply.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            location.reload();
        }
    };
    xhr.send('message=' + message + '&parent_id=' + commentId + '&user_id=' + userId + '&name=' + name);
}

function toggleReplies(button) {
    var targetId = button.getAttribute("data-target");
    var replies = document.getElementById(targetId);

    if (replies.style.display === "none" || replies.style.display === "") {
        replies.style.display = "block";
        button.innerText = "Hide Replies";
    } else {
        replies.style.display = "none";
        button.innerText = "Show Replies";
    }
}

</script>
