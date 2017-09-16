<?php
    $title = "imresizer::Make signed photo online";
    $description = "Make signed photo for any online application in cm, mm, inch or pixel";

    //$keywords = "resize,crop,convert,rotate,resizing,cropping,converter,rotator,resizer,mm,cm,inch,pixel,jpg,png,gif,pdf,bmp,tiff";

    include_once "template/header.php";
?>

<div class="col-sm-8">
    <div id= "centernav" style="text-align: left; font-size: x-large; background-color: rgba(0,0,0,0.3); color: whitesmoke;">

        <!-- blog content starts -->

        <style type="text/css">
            h1{
                background-color: rgba(255,255,255,1);
                text-align: center;
                color: black;
            }
            h2{
                background-color: rgba(255,255,255,0.7);
                color: black;
            }
            li{
                margin-bottom: 20px;
            }
        </style>

        <h1> How to make signed photo for any online application </h1>

        <div>
            <h2> You will need </h2>
            <ol style="text-align: center;">
                <li>
                    <figure>
                        <img src="assets/signedPhoto/captain.jpg" alt="photo" width="200">
                        <figcaption>A photo of any dimension</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="assets/signedPhoto/sign.png" alt="sign" width="200">
                        <figcaption>A sign of any dimension</figcaption>
                    </figure>
                </li>
            </ol>
        </div>


        <div>
            <h2> You will get </h2>
            <figure style="text-align: center;">
                <img src="assets/signedPhoto/combined.jpg" alt="combined photo" width="200">
                <figcaption>Signed photo of specific size in cm, mm or inch (e.g. 3.5cm X 4.5cm)</figcaption>
            </figure>
        </div>

        <h1> 2 stpes to make singed photo for any online application using imresizer.com: </h1>
        <ul>
            <li>
                <div>
                    <h2> step1: Resize both photo and sign to specific size. </h2>
                    <ol>
                        <li> Choose Upload option from Left Panel & Upload the sign or photo <br>
                            <figure style="text-align: center;">
                                <img src="assets/signedPhoto/left_panel.png" alt="left panel" width="200">
                                <figcaption>Fig: Left Panel</figcaption>
                            </figure>

                            <img src="assets/signedPhoto/upload.jpg" alt="upload" width="80%">
                        </li>

                        <li> Crop the photo if needed <br>
                            <img src="assets/signedPhoto/crop.jpg" alt="crop" width="80%">
                        </li>

                        <li> Resize to specific size(e.g. 3.5cm X 3.5cm or 3.5cm X 1cm).<br>
                            <img src="assets/signedPhoto/resize.jpg" alt="crop" width="80%">
                        </li>
                        <li> Download and store the both image in your computer. It will be required for combining.</li>
                    </ol>
                </div>
            </li>

            <li>
                <div>
                    <h2> step2: Combine both resized photo and sign. </h2>
                    <ol>
                        <li> Upload the photo <br>
                            <img src="assets/signedPhoto/upload.jpg" alt="upload" width="80%">
                        </li>

                        <li> From combine option upload the Sign. <br>
                            <img src="assets/signedPhoto/combine.jpg" alt="upload" width="80%">
                        </li>
                        <li> Download your final signed photo. <br>
                            <img src="assets/signedPhoto/combined.jpg" alt="upload" width="500">
                        </li>
                    </ol>
                </div>
            </li>
        </ul>
         <!-- blog content ends -->
    </div>
<!-- </div> -->
<?php include_once "template/footer.php"; ?>
