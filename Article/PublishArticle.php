<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publish Article</title>
    <link rel="stylesheet" href="PublishArticle.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <script src="../Index/index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
?>
    <main>
        <h1>Publish an Article</h1>
        <section class="container">
            <form action="HandleArticlePublish.php" class="form" method="post" enctype="multipart/form-data">
                <div id="title_container">
                <label for="title" class="label" id="title_label">Title:</label>
                <input type="text" name="title" id="title" required>
                </div>
                <div id="category_container">
                    <p class="label">Article's category/ies:</p>
                    <div id="category_checkbox">
                        <div>
                        <input type="checkbox" id="Sustainable_agriculture" name="categories[]" value="Sustainable_agriculture">
                        <input type="hidden" id="Sustainable_agriculture" name="allCategories[]" value="Sustainable_agriculture">
                        <label for="Sustainable_agriculture" class="check_box_label">Sustainable agriculture</label>
                        </div>
                        <div>
                        <input type="checkbox" id="Marine_conservation" name="categories[]" value="Marine_conservation">
                        <input type="hidden" id="Marine_conservation" name="allCategories[]" value="Marine_conservation">
                        <label for="Marine_conservation" class="check_box_label">Marine conservation</label>
                        </div>
                        <div>
                        <input type="checkbox" id="Nature_conservation" name="categories[]" value="Nature_conservation">
                        <input type="hidden" id="Nature_conservation" name="allCategories[]" value="Nature_conservation">
                        <label for="Nature_conservation" class="check_box_label">Nature conservation</label>
                        </div>
                        <div>
                        <input type="checkbox" id="Renewable_energy" name="categories[]" value="Renewable_energy">
                        <input type="hidden" id="Renewable_energy" name="allCategories[]" value="Renewable_energy">
                        <label for="Renewable_energy" class="check_box_label">Renewable energy</label>
                        </div>
                        <div>
                        <input type="hidden" id="Reforestation" name="allCategories[]" value="Reforestation">
                        <input type="checkbox" id="Reforestation" name="categories[]" value="Reforestation">
                        <label for="Reforestation" class="check_box_label">Reforestation</label>
                        </div>
                    </div>

                </div>
                <div id="description_container">
                    <label for="description" class="label">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Give a brief description of your article"></textarea>
                </div>
                <div id="detailed_container">
                    <label for="detailed" class="label">Detailed Article:</label>
                    <textarea name="detailed" id="detailed" cols="30" rows="10" placeholder="Compose your article's main body here"></textarea>
                </div>
                <div>
                    <div id="multimedia_container">
                    <div class="label">Multimedia:</div>
                    <label for="multimedia" id="multimedia_button">Choose Files</label>
                    <input type="file" id="multimedia" multiple name="multimedia[]" accept="image/png, image/jpeg, image/jpg, video/mp4">
                    </div>
                </div>
                <section id="button_container">
                    <a href="../Index/index.php" id="cancel">Cancel</a>
                    <button type="submit" name="submit" id="submit">Publish</button>
                </section>
            </form>
        </section>
        <footer id="contact-us">
            <div id="footer-title-container">
                <h1><b>Contact Us!</b></h1>
            </div>
            <div id="footer-details-container">
                <div id="contact-info">
                    <p>Telephone: +30 123123123</p>
                    <p>Email: contact-us@greenhand.com</p>
                    <p>Street Adress: Fictinal Street 15</p>
                </div>
                <div id="follow-us">
                    <div id="follow-us-title"><b>Follow Us!</b></div>
                    <div id="follow-us-links">
                        <a href=""><img src="../Assets/facebook-logo.png" alt=""></a>
                        <a href=""><img src="../Assets/twitter-logo.png" alt=""></a>
                        <a href=""><img src="../Assets/youtube-logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
    </main>

</body>
</html>