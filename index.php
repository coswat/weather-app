<?php
require_once __DIR__.'/class/Weather.php';

$weather = new Weather($_SERVER['REMOTE_ADDR']);

$weather->getInfo();

$weather = $weather->load();
date_default_timezone_set('Asia/Kolkata');
$time = date("h:i:sa");
$time = explode(':',$time);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   <section class="vh-100" style="background-color: #4B515D;">
  <div class="container py-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card" style="color: #4B515D; border-radius: 35px;">
          <div class="card-body p-4">

            <div class="d-flex">
              <h6 class="flex-grow-1"><?= $weather[0]->name ?></h6>
              <h6><?php echo $time[0].':'.$time[1] ?></h6>
            </div>

            <div class="d-flex flex-column text-center mt-5 mb-4">
              <h6 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"> <?= $weather[0]->main->temp; ?>°C </h6>
              <span class="small" style="color: #868B94"><?= $weather[0]->weather[0]->main; ?></span>
            </div>

            <div class="d-flex align-items-center">
              <div class="flex-grow-1" style="font-size: 1rem;">
                <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> <span class="ms-1"> wind : <?= $weather[0]->wind->speed ?> km/h
                  </span></div>
                <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> <span class="ms-1"> humdity : <?= $weather[0]->main->humidity ?>% </span>
                </div>
                <div><i class="fas fa-sun fa-fw" style="color: #868B94;"></i> <span class="ms-1"><?= $weather[0]->sys->country ?> </span>
                </div>
              </div>
              <div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                  width="100px">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
  </body>
</html>
