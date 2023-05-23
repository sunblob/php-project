<?php
require('inc/config.php');

session_start();

$current_user = null;

if (isset($_SESSION['id'])) {
  $current_user = $user->get_by_id($_SESSION['id'])[0];
}

if ($current_user == null || $current_user->role != 'ADMIN') {
  header("Location: no-permission.php");
}

?>

<?php
include('partials/admin/header.php');
?>

<body>
  <main class="container">
    <section>
      <h1>Welcome <?php echo ($_SESSION['user_login']); ?></h1>
    </section>

    <h2>Qna</h2>
    <form action="inc/qna/insert.php" method="post">
      <input class="form-input" type="text" name="question" placeholder="Question">
      <input class="form-input" type="text" name="answer" placeholder="Answer">
      <input class="btn" type="submit" value="Add" name="add_qna">
    </form>
    <?php
    $qna_list = $qna->get_qna();

    echo '<table class="admin-table">';
    echo '<tr>';
    echo '<th>Question</th>';
    echo '<th>Answer</th>';
    echo '</tr>';
    foreach ($qna_list as $q) {
      echo '<tr>';
      echo '<td>' . $q->question . '</td>';
      echo '<td>' . $q->answer . '</td>';
      echo '<td>
              <form action="inc/qna/delete.php" method="post">
                  <button class="btn" type="submit" name="delete_qna" value="' . $q->id . '"' . '>Delete</button>
              </form>';
      echo '</tr>';
      echo '<tr>';
      echo '<td colspan="4">
              <div>Edit qna</div> 
              <form action="inc/qna/update.php" method="post">
                  <input type="hidden" name="form_id" value="' . $q->id . '"' . '>
                  <input class="form-input" type ="text" name="update_question" placeholder="Question" value="' . $q->question . '">
                  <input class="form-input" type ="text" name="update_answer" placeholder="Answer" value="' . $q->answer . '">
                  <input class="btn" type="submit" name="update_qna" value="Edit">
              </form>
          </td>';
      echo '</tr>';
    }
    echo '</table>';
    ?>
    </section>
    <section>
      <h2>Contacts</h2>
      <?php
      $contact_list = $contact->get_contacts();
      echo '<table class="admin-table">';
      echo '<tr>';
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>Message</th>';
      echo '</tr>';
      foreach ($contact_list as $c) {
        echo '<tr>';
        echo '<td>' . $c->name;
        '</td>';
        echo '<td>' . $c->email;
        '</td>';
        echo '<td>' . $c->message;
        '</td>';
        echo '<td>
                            <form action="inc/contact/edit.php" method="post">
                                <button type = "submit" name="edit_contact" value="' . $c->id . '"' . '>Editovať</button>
                            </form></td>';
        echo '<td>
                            <form action="inc/contact/delete.php" method="post">
                                <button type = "submit" name="delete_contact" value="' . $c->id . '"' . '>Vymazať</button>
                            </form></td>';
        echo '</tr>';
      }
      echo '</table>';
      ?>
    </section>
  </main>


</body>

</html>