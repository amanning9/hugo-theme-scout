<form method="post" class="my-2">
    <input type="hidden" value="<?= session_id(); ?>" name="sessionKey">
  <div class="form-group">
    <label for="senderName">Name</label>
    <input type="text" class="form-control" id="senderName" name="senderName" required>
  </div>
  <div class="form-group">
    <label for="senderEmail">Email Address</label>
    <input type="email" class="form-control" id="senderEmail" name="senderEmail" required>
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" required>
  </div>
  <div class="form-group">
    <label for="messageBody">Message</label>
    <textarea class="form-control" id="messageBody" name="messageBody" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
