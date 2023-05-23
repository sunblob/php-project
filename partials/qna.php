<section class="container">
  <h2>FAQ</h2>
  <div class="question-list">
    <?php

    $qna_list = $qna->get_qna();
    print_qna($qna_list);

    ?>
  </div>
</section>