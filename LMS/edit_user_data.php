<!DOCTYPE html>
<html>
  <?php
  include 'core/init.php';
  protected_page();

    if (empty($_post) === false){
      $list = array('user_name', 'email');
      foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $list) === true) {
          $errors[2] ='*Marked fields are required';
          break 1;
        }
      }
      if (empty($errors[2]) === true) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
          $errors[2] ='not a vaild email address';
        }else if(preg_match("/\\s/",$_POST['username'])){
          $errors[2] ='username must not contain spaces';
        }else if(user_exist($_POST['username'])){
          $errors[2] ='username alredy exist';
        }
    }
  }
  include 'includes/head.php';
  ?>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="content">

      <?php
      if (logged_in() === true){
        include 'includes/widgets/loggedinw.php';
      }else {
        include 'includes/widgets/loginw.php';
      }
      ?>

      <div class="pro-pic">

      </div>

      <h1 id="username"><?php echo $user_data['first_name'] ?> <?php echo $user_data['last_name'] ?></h1>
      <?php
      if (empty($_POST) === false && empty($errors) === true) {
        $update_data = array(
                             'user_name' => $_POST['user_name'],
                             'first_name' => $_POST['first_name'],
                             'last_name' => $_POST['last_name'],
                             'email' => $_POST['email'],
                             'gender' => $_POST['gender']
                             );
        //update_user($update_data);
        header('Location: userprofile.php');
        exit();
      } else if(empty($errors) === false){?>
        <div class="errors">
          <?php echo $errors[2]; ?>
        </div><?php
      }

      ?>
        <div class="user-data-form">
          <form class="" action="" method="post">
            <table>
              <tr>
                <td>
                  User Name*
                </td>
                <td>
                   <input type="text" name="user_name" value="">
                </td>
              </tr>
              <tr>
                <td>
                  First Name
                </td>
                <td>
                   <input type="text" name="first_name" value="">
                </td>
              </tr>
              <tr>
                <td>
                  Last Name
                </td>
                <td>
                  <input type="text" name="last_name" value="">
                </td>
              </tr>
              <tr>
                <td>
                  e-Mail*
                </td>
                <td>
                   <input type="text" name="email" value="">
                </td>
              </tr>
              <tr>
                <td>
                  Gender
                </td>
                <td>
                   <input type="text" name="gender" value="">
                </td>
              </tr>
              <tr>
                <td>
                </td>
                <td>
                   <input id="cb" type="submit" value="Save Changes">
                </td>
              </tr>
            </table>
          </form>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
