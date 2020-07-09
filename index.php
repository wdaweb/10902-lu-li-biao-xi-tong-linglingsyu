<?php
include_once "base.php";
$profile = new DB("resume_profile");
$picture = new DB("resume_picture");
$link = new DB("resume_link");
$self = new DB("resume_self");
$back = new DB("resume_skillback");
$cert = new DB("resume_skillcert");
$front = new DB("resume_skillfront");
$lan = new DB("resume_skilllan");
$soft = new DB("resume_skillsoft");
$study = new DB("resume_study");
$user =  new DB("resume_user");
$work = new DB("resume_work");
$prot = new DB("resume_prot");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <title>Elsa Syu 's resume</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Roboto&family=Josefin+Sans&family=Lobster&family=Caveat:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-4">
                <div class=" mx-auto">
                    <div class="introduction">
                        <?php
                        $pics = $picture->find(["userid" => 1, "sh" => 1]);
                        $pros = $profile->find(["userid" => 1]);
                        $lineshow = ($pros["lineshow"]) ? $pros["lineid"] : "暫不顯示";
                        ?>
                        <img src="<?= $pics["path"] ?>" class="card-img-top img-fluid w-50 py-1">
                        <h1 class="text-center"><?= $pros["name"] ?><small><?= $pros["enname"] ?></small></h1>
                        <p><?= $pros["intr"] ?></p>
                    </div>
                    <div class="contact">
                        <h4>Contact me</h4>
                        <ul class="pl-2">
                            <li><img src="img/line.jpg" class="img-fluid w-25 float-right mr-3"></li>
                            <li><i class="fas fa-envelope-square"></i><span class="pl-2"><?= $pros["email"] ?></span></li>
                            <li><i class="fab fa-line"></i><span class="pl-2"><?= $lineshow; ?></span></li>
                        </ul>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="link ">
                    <?php

                    $links = $link->all(["userid" => 1]);
                    ?>
                    <h4>Follow me</h4>
                    <div class="pl-1">
                        <?php
                        foreach ($links as $row) {
                            switch ($row['name']) {
                                case "facebook":
                                    $icon = "fab fa-facebook-square";
                                    break;
                                case "instagram":
                                    $icon = "fab fa-instagram-square";
                                    break;
                                case "Github":
                                    $icon = "fab fa-github";
                                    break;
                                case "Portfolio":
                                    $icon = "fas fa-link";
                                    break;
                                default:
                                    $icon = "fas fa-smile-wink";
                            }
                        ?>
                            <a class="mx-1" href="<?= $row['link'] ?>" title="<?= $row['name']; ?>" target="_blank"><i class="<?= $icon; ?>"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="content" class="col-8 px-0">
                <div class="px-4 pt-3">
                    <div id="About" class="mb-5">
                        <h1>ABOUT ME</h1>
                        <table class="table table-sm table-borderless ml-2">
                            <tbody>
                                <tr>
                                    <th>生日</th>
                                    <td><?= $pros["birthday"] ?></td>
                                </tr>
                                <tr>
                                    <th>現居住地</th>
                                    <td><?= $pros["live"] ?></td>
                                </tr>
                                <tr>
                                    <th>欲應徵職位</th>
                                    <td>前端/後端/全端網頁工程師</td>
                                </tr>
                                <tr>
                                    <th>可上班日期</th>
                                    <td>隨時可上班</td>
                                </tr>
                                <tr>
                                    <th>希望上班地點</th>
                                    <td>台北市</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="study" class="mb-5">
                        <h1>EDUCATION</h1>
                        <ul class="position-relative mt-3">
                            <?php
                            $mon = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            $stu = $study->all(["userid" => 1, "sh" => 1]);
                            foreach ($stu as $st) {
                            ?>
                                <li class="mt-3"><span class="ml-2"><?= $st['school'] . " " . $st['dept'] . "(" . $st['edu'] . $st['status'] . ")"; ?></span></li>
                                <span class="ml-4 pl-2 year"><?= $mon[$st['s_month']] . "," . $st['s_year']; ?> ~ <?= $mon[$st['g_month']] . "," . $st['g_year']; ?></span>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="work" class="mb-5">
                        <h1>WORK EXRERIENCE</h1>
                        <ul class="position-relative mt-3">
                            <?php
                            $wor = $work->all(["userid" => 1, "sh" => 1]);
                            foreach ($wor as $wo) {
                                $str = $mon[$wo['e_month']] . ", " . $wo['e_year'];
                                $endtime = ($wo['inwork'] == "true") ? "在職" : $str;
                            ?>
                                <li class="my-1 mt-3"><span class="ml-2"><?= $wo["com"]; ?> - <?= $wo["pos"]; ?></span></li>
                                <span class="ml-4 pl-2 year"><?= $mon[$wo['s_month']] . "," . $wo['s_year']; ?> ~ <?= $endtime; ?></span>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="skill" class="mb-5">
                        <h1>SKILL</h1>
                        <div class="front mb-3 ">
                            <h5 class="mb-1 mt-3"> <i class="fas fa-angle-right"></i> FrontEnd</h5>
                            <div class="pl-3">
                                <div class="mb-2 row justify-content-center align-items-center">
                                    <?php
                                    $fro = $front->all(["userid" => 1]);
                                    foreach ($fro as $fo) {
                                    ?>
                                        <div class="col-2 ml-1 my-1"><?= $fo["name"]; ?></div>
                                        <div class="col-9 pl-0 ">
                                            <div class="progress" style="height: 0.4rem;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?= $fo['level']; ?>%;height: 0.4rem"></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="backend mt-2 mb-3">
                            <h5 class="mb-1"> <i class="fas fa-angle-right"></i> BackEnd</h5>
                            <div class="pl-3">
                                <div class="mb-2 row justify-content-center align-items-center">
                                    <?php
                                    $bac = $back->all(["userid" => 1]);
                                    foreach ($bac as $ba) {
                                    ?>
                                        <div class="col-2 ml-1 my-1"><?= $ba["name"]; ?></div>
                                        <div class="col-9 pl-0 ">
                                            <div class="progress" style="height: 0.4rem;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?= $ba['level']; ?>%;height: 0.4rem"></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="drow mt-2 mb-3">
                            <h5 class="mb-1"> <i class="fas fa-angle-right"></i> Softward</h5>
                            <div class="pl-3">
                                <div class="row justify-content-center align-items-center">
                                    <?php
                                    $sof = $soft->all(["userid" => 1]);
                                    foreach ($sof as $so) {
                                    ?>
                                        <div class="col-2 ml-1 my-1"><?= $so["name"]; ?></div>
                                        <div class="col-9 pl-0 ">
                                            <div class="progress" style="height: 0.4rem;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?= $so['level']; ?>%;height: 0.4rem"></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="language mb-3">
                            <h5 class="mb-1"> <i class="fas fa-angle-right"></i> Language</h5>
                            <div class="pl-3">
                                <div class="mb-2 row justify-content-center align-items-center">
                                    <?php
                                    $lang = $lan->all(["userid" => 1]);
                                    foreach ($lang as $la) {
                                    ?>
                                        <div class="col-2 ml-1 my-1"><?= $la["name"]; ?></div>
                                        <div class="col-9 pl-0 ">
                                            <div class="progress" style="height: 0.4rem;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?= $la['level']; ?>%;height: 0.4rem"></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="certificate mb-3">
                            <h5 class="mb-1"> <i class="fas fa-angle-right"></i> Certificate</h5>
                            <ul>
                                <?php
                                $car = $cert->all(["userid" => 1]);
                                foreach ($car as $ca) {
                                ?>
                                    <li class="mb-2 pl-3"><?= $ca["name"] . $ca["level"]; ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div id="portfolio" class="mb-5">
                        <h1>Portfolio</h1>
                        <div class="row mx-auto mt-3" style="width:99%">
                            <?php
                            $pro = $prot->all(["userid"=>1]);
                            foreach ($pro as $pr){
                            ?>
                            <div class="col-6 ">
                                <div class="card border border-danger">
                                <div class="box"><a href="<?= $pr['link'] ?>" target="_balck" ><img src="<?= $pr['pic'] ?>" class="card-img-top" ></a></div>
                                    <div class="card-body card-body-bg">
                                        <p class="card-text"><h4 class="pro_title"><?= $pr['name'] ?></h4><?= nl2br($pr['legend']) ?></p>
                                    </div>
                                </div>
                            </div>
                      
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div id="self" class="mb-5">
                        <h1>Autobiography</h1>
                        <div class="row mx-auto" style="width:99%">
                            <p>
                                <?php
                                $se = $self->find(["userid" => 1, "sh" => 1]);
                                echo nl2br($se['text']);
                                ?>
                            </p>

                        </div>
                    </div>
                </div>
                <div id="footer" class="py-2">
                    Copyright © 2020 Elsa Syu All rights reserved
                </div>
            </div>
            <div id="login"><a href="login.html" target="_black"><i class="fas fa-sign-in-alt"></i></a></div>
        </div>
    </div>

    <script>

    </script>
</body>


</html>