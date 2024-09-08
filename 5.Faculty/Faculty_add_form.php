<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Faculty Member</title>
  <link rel="stylesheet" href="/Project/CSS/Form.css" />
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
          <h1>Faculty Member</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <form id="stripe-login" action="Faculty_add.php" method="post">
                <div class="field padding-bottom--24">
                  <label for="name"> Name : </label>
                  <input type="text" name="name" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="degree"> Degree : </label>
                  <input type="text" name="degree" />
                </div>
                <div class="field padding-bottom--24">
                  <label for="position"> Position : </label>
                  <input type="text" name="position" />
                </div>

                <div class="field padding-bottom--24">
                  <Button type="submit" name="s_no" value="$s_no">Submit</Button>
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