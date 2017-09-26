<form action="complaintBox.php" method="POST">
    <div>
        <label>Subject</label>
        <input type="text" name="subject" />
    </div>
    <div>
        <label>Who are you? (full name)</label>
        <input type="text" name="fullName" />
    </div>
    <div>
        <label>What's the problem</label>
        <textarea rows="5" name="description"></textarea>
    </div>
    <div>
        <input type="submit" value="Complain" />
    </div>
    <div>
        <input type="hidden" value="REAL_REQUEST" />
    </div>
</form>
