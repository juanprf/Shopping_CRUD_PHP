<?php
  include("db.php");
  include('includes/header.php');
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php // Show alerts
        if (isset($_SESSION['message'])):
      ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
        // Clean session
        session_unset();
        endif;
      ?>

      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save">
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date of creation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM task";
            $result_tasks = mysqli_query($conn, $query);    
            
            while ($row = mysqli_fetch_assoc($result_tasks)):
          ?>
          <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['date_creation'] ?></td>
            <td>
              <a href="edit_task.php?id=<?= $row['id'] ?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>