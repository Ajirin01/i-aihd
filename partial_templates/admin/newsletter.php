<div class="container mt-5">
    <h2>Send Newsletter</h2>
    <form action="/admin/send_newsletter.php" method="post">
        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Newsletter</button>
    </form>
</div>
