<?php

$host = "127.0.0.1:3308";
$user = "root";
$password = "";
$db = "powerec";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
  die('connection error');
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//  echo '<pre>';
//  var_dump($_FILES);
//  echo '</pre>';

$errors = [];
$fullname = '';
$username = '';
$email = '';
$pwd = '';
$repeatpwd = '';
$usertype = '';

$sql = "SELECT * FROM user";
$statement = mysqli_stmt_init($data);
$prepare = mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_execute($statement);
$getresult = mysqli_stmt_get_result($statement);
$fetchs = mysqli_fetch_assoc($getresult);
mysqli_stmt_close($statement);

// $result = mysqli_query($data, $sql);
// $fetchs = mysqli_fetch_array($result);
// mysqli_stmt_close($data);

?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Manage User">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Home</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Home.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.3.0, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i">


  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Home">
  <meta property="og:type" content="website">
</head>

<body data-home-page="Home.html" data-home-page-title="Home" class="u-body">
  <header class="u-clearfix u-header u-header" id="sec-b491">
    <div class="u-clearfix u-sheet u-sheet-1"></div>
  </header>
  <section class="u-align-center u-clearfix u-section-1" id="carousel_31fa">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h1 class="u-custom-font u-font-source-sans-pro u-text u-text-default u-text-palette-5-dark-2 u-text-1">Manage User</h1>
      <a href="https://nicepage.com/landing-page" class="u-border-2 u-border-custom-color-1 u-border-hover-custom-color-1 u-btn u-btn-round u-button-style u-custom-color-1 u-radius-8 u-btn-1">add user</a>
      <p class="u-text u-text-default u-text-2">Duis aute irure dolor in reprehenderit in voluptate velit esse </p>
      <div class="u-table u-table-responsive u-table-1">
        <table class="u-table-entity u-table-entity-1">
          <colgroup>
            <col width="2.9%">
            <col width="6.8%">
            <col width="11%">
            <col width="21.8%">
            <col width="18.1%">
            <col width="13%">
            <col width="12.3%">
            <col width="14.2%">
          </colgroup>
          <thead class="u-align-center u-custom-font u-font-roboto-condensed u-palette-1-base u-table-header u-table-header-1">
            <tr style="height: 35px;">
              <th class="u-align-center u-border-1 u-border-white u-custom-font u-grey-10 u-table-cell u-text-font u-table-cell-1">No</th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-2"><b>image</b>
                <br>
              </th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-3"><b>username</b>
              </th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-4"><b>fullname</b>
              </th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-5">email</th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-6">phone number</th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-7">user type</th>
              <th class="u-border-1 u-border-white u-palette-3-light-2 u-table-cell u-table-cell-8">action</th>
            </tr>
          </thead>
          <tbody class="u-align-center u-table-body u-table-body-1">
            <?php foreach ($getresult as $i => $fetch) { ?>

              <tr>
                <th scope="row">
                  <?php echo $i + 1 ?>
                </th>
                <td>
                  <img src="<?php echo $fetch['image'] ?>" class="thumb-image" alt="">
                </td>
                <td>
                  <?php echo $fetch['username'] ?>
                </td>
                <td>
                  <?php echo $fetch['Fullname'] ?>
                </td>
                <td>
                  <?php echo $fetch['email'] ?>
                </td>
                <td>
                  <?php echo $fetch['usertype'] ?>
                </td>
                <td>
                  <form class="lol" method="post" action="editUser.php?id=<?php echo $fetch['id'] ?>">
                    <input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
                    <button type="submit" class="btn-sm btn btn-outline-primary">Edit</button>
                  </form>
                  <form class="lol" method="post" action="deleteUser.php">
                    <input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
                    <button type="submit" class="btn-sm btn btn-outline-danger">Delete</button>
                  </form>
                </td>

              </tr>


            <?php } ?>
            <tr style="height: 78px;">
              <td class="u-align-center u-border-2 u-border-white u-grey-10 u-table-cell u-table-cell-17"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-5-dark-1 u-table-cell-18"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-3-base u-table-cell-19"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-1-base u-table-cell-20"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-1-base u-table-cell-21"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-1-base u-table-cell-22"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-1-base u-table-cell-23"></td>
              <td class="u-border-2 u-border-white u-grey-10 u-table-cell u-text-palette-1-base u-table-cell-24"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="https://nicepage.com/landing-page" class="u-border-2 u-border-hover-custom-color-1 u-border-palette-1-base u-btn u-btn-round u-button-style u-none u-radius-8 u-btn-2">edit<span style="font-size: 1rem;"></span>
      </a>
      <a href="https://nicepage.com/landing-page" class="u-border-2 u-border-hover-palette-2-base u-border-palette-1-base u-btn u-btn-round u-button-style u-none u-radius-8 u-btn-3">DELETE</a>
    </div>
  </section>


  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-900c">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span>
    </a>.
  </section>
</body>

</html>