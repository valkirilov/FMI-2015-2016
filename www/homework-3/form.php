<?php
session_start();
$_POST = $_SESSION['post_data'];
?>

<form method="POST" action="server.php" enctype="multipart/form-data">
<fieldset>
  <legend>Title*</legend>
  <input type="text" name="title" placeholder="Title" maxlength="20" value="<?php echo $_POST['title'] ?>" required />
  <p style="color: #ff0000;"><?php echo $_POST['errors']['title'] ?></p>
</fieldset>

<fieldset>
  <legend>Description*</legend>
  <textarea name="description" placeholder="Type your description here ..." maxlength="200" required ><?php echo $_POST['description'] ?></textarea>
  <p style="color: #ff0000;"><?php echo $_POST['errors']['description'] ?></p>
</fieldset>

<fieldset>
  <legend>Lecturer Name*</legend>
  <input type="text" name="lecturer_name" placeholder="Lecturer Name" maxlength="20" required value="<?php echo $_POST['lecturer_name'] ?>" />
  <p style="color: #ff0000;"><?php echo $_POST['errors']['lecturer_name'] ?></p>
</fieldset>

<fieldset>
  <legend>Lecturer Email</legend>
  <input type="text" name="lecturer_email" placeholder="Lecturer Email" value="<?php echo $_POST['lecturer_email'] ?>" />
  <p style="color: #ff0000;"><?php echo $_POST['errors']['lecturer_email'] ?></p>
</fieldset>

<fieldset>
  <legend>Type*</legend>
  <label>
    <input type="radio" name="type" value="elective" <?php echo $_POST['type'] == 'elective' ? 'checked' : '' ?> /> Elective
  </label>
  <label>
    <input type="radio" name="type" value="mandatory" <?php echo $_POST['type'] == 'mandatory' ? 'checked' : '' ?> /> Mandatory
  </label>
  <p style="color: #ff0000;"><?php echo $_POST['errors']['type'] ?></p>
</fieldset>

<fieldset>
  <legend>Course*</legend>
  <select name="course" required>
    <option value="first" <?php echo $_POST['course'] == 'first' ? 'selected' : '' ?>>First</option>
    <option value="second" <?php echo $_POST['course'] == 'second' ? 'selected' : '' ?>>Second</option>
    <option value="third" <?php echo $_POST['course'] == 'third' ? 'selected' : '' ?>>Third</option>
    <option value="fourth" <?php echo $_POST['course'] == 'fourth' ? 'selected' : '' ?>>Fourth</option>
    <option value="fifth" <?php echo $_POST['course'] == 'fifth' ? 'selected' : '' ?>>Fifth</option>
    <option value="all" <?php echo $_POST['course'] == 'all' ? 'selected' : '' ?>>For all</option>
  </select>
  <p style="color: #ff0000;"><?php echo $_POST['errors']['course'] ?></p>
</fieldset>

<fieldset>
  <legend>Program*</legend>
  <label>
    <input type="checkbox" name="program" value="bachelor" <?php echo $_POST['program'] == 'bachelor' ? 'checked' : '' ?> /> Bachelor
  </label>
  <label>
    <input type="checkbox" name="program" value="master" <?php echo $_POST['program'] == 'master' ? 'checked' : '' ?> /> Master
  </label>
  <p style="color: #ff0000;"><?php echo $_POST['errors']['program'] ?></p>
</fieldset>

<fieldset>
  <legend>Add materials</legend>
  <label>
    <input type="file" name="add_materials[]" accept="application/zip" />
  </label>
</fieldset>

<br /><br />

<input type="hidden" name="your_name" value="My Name" />
<input type="submit" name="submit" value="Submit" />
</form>