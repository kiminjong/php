<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="jumbotron text-center">
      <h1 class="display-3">Quan Ly Nhan Su</h1>
      <p class="lead">With CodeIgniter</p>
      <hr class="my-2">
  </div>
  <div class="container-fluid">
      <div class="row">
        <div class="col-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title text-center">Sua Nhan Vien</h4>
            </div>
            <div class="card-body">
              <?php foreach ($dulieusua as $value): ?>
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/nhansu/update_nhansu">
                  <fieldset class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?= $value['id'] ?>">
                    <div class="col-xs-6">
                      <img src="<?= $value['avatar'] ?>" alt="" class="img-fluid">
                    </div>
                    <label for="avatar">Avatar</label>
                    <input type="hidden" class="form-control" name="avatarnew" value="<?= $value['avatar'] ?>">
                    <input type="file" class="form-control" name="avatar" id="avatar" placeholder="Avatar">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="ten"  id="ten" value="<?= $value['ten'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="tuoi"  id="tuoi" value="<?= $value['tuoi'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="diachi"  id="diachi" value="<?= $value['diachi'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="sdt"  id="sdt" value="<?= $value['sdt'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="sodonhang"  id="sodonhang" value="<?= $value['sodonhang'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="facebook"  id="facebook" value="<?= $value['facebook'] ?>">
                  </fieldset>
                  <fieldset class="form-group">
                    <button class="btn btn-info btn-block" type="submit">Luu</button>
                  </fieldset>
                </form>
              <?php endforeach ?> 
            </div>
          </div>
        </div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>