<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="/Project/CSS/Form.css" />
    <title>MOU</title>
    <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>
<body>

<div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh; flex-grow: 1">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end">
            <div class="box-root" style="
                  background-image: linear-gradient(
                    white 0%,
                    rgb(247, 250, 252) 33%
                  );
                  flex-grow: 1;
                "></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2">
            <div class="box-root box-background--blue800" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>MOU</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <form id="stripe-login" action="mou_add.php" method="post" enctype="multipart/form-data">
                <div class="field padding-bottom--24">
                  <label for="title"> Title : </label>
                  <input type="text" name="title" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="company"> Company/Organization : </label>
                  <input type="text" name="company" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="amount"> Amount : </label>
                  <input type="text" name="amount" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="date"> Date : </label>
                  <input type="text" name="date" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="year"> Year : </label>
                  <input type="text" name="year" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="Role"> Upload the File : </label>
                  <input type="file" name="file" />
                </div>

                <div class="field padding-bottom--24">
                  <Button type="submit">Submit</Button>
                  <Button type="reset" value="Reset">Reset</Button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
