<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href="AboutUs.css">
    <link rel="stylesheet" href="../miscellaneous.css">
    <title>Greenhand</title>
    <script src="../Index/index.js"></script>
</head>
<body>
<?php
include_once '../includes/Header.inc.php';
?>
<main>
    <h1>About Us</h1>
    <section class="container">
        <div class="content_container">
            <p>
                Το “GreenHand” θα είναι το Πληροφοριακό Σύστημα Παγκόσμιου Ιστού (ΠΣΠΙ) που θα αναπτύξει η ομάδα μας.
                Πρόκειται για μια εφαρμογή στο πλαίσιο του “Κάνε το μέλλον σου πράσινο (Make it Green)” όπου εστιάζει
                στην
                εθελοντική δραστηριότητα για να διασφαλίσουμε ένα πιο «πράσινο» και βιώσιμο μέλλον. Πιο συγκεκριμένα, θα
                παρέχεται η δυνατότητα σε εθελοντικές ομάδες/οργανισμούς/κοινότητες (αλλά και γενικότερα σε οποιονδήποτε
                φορέα
                επιθυμεί) να δημοσιοποιούν εθελοντικές δράσεις (Π.χ. Είμαστε η Greenpeace και το ερχόμενο Σάββατο θα
                κάνουμε
                αναδάσωση στο Σέιχ Σου λόγω της μεγάλης καταστροφής που υπέστη από την Πυρκαγιά του καλοκαιριού και θα
                χρειαστούμε: (i) 30 Εθελοντές, (ii) 100 Δενδρίδια και (iii) 200€ για διάφορα έξοδα). Στο web app, θα
                συνδέονται
                επίσης και εθελοντές οι οποίοι θα μπορούν να αναζητούν αντίστοιχες δραστηριότητες που θα ήθελαν να
                πάρουν
                μέρος
                βάσει ορισμένων κριτηρίων (π.χ. προσωπικά ενδιαφέροντα, τοποθεσία & ημερομηνία της δράσης, τρόπος
                συνεισφοράς
                στην εθελοντική δραστηριότητα) και θα μπορούν να επιλέξουν να συνεισφέρουν σε μια εθελοντική
                δραστηριότητα
                προσφέροντας εργασία είτε αγαθά/χρήματα (δωρεές-χορηγίες). Επιπλέον, θα υποστηρίζει την ανάρτηση
                δημοσιεύσεων
                για την ενημέρωση και την ευαισθητοποίηση γύρω από περιβαλλοντικά ζητήματα που αφορούν την Ε.Ε, όπως και
                αναρτήσεις που θα δημοσιοποιούν εθελοντικές δραστηριότητες που έλαβαν χώρα κατά το παρελθόν. Τέλος, οι
                χρήστες
                θα μπορούν να χρησιμοποιούν τη διαδικτυακή εφαρμογή για να ενημερώνονται ως προς την εξέλιξη των
                διάφορων
                ενεργειών στις οποίες έχουν δηλώσει ενδιαφέρον ή ακόμα και συμμετοχή.
            </p>
            <div id="img_button_container"><img id="volunteer-img"
                    src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dm9sdW50ZWVyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    alt="image of a volunteer">
                <a href="../Index/index.php">
                    <button>Join Us!</button>
                </a>
            </div>
        </div>
    </section>
    <footer id="contact-us">
        <div id="footer-title-container">
            <h1><b>Contact Us!</b></h1>
        </div>
        <div id="footer-details-container">
            <div id="contact-info">
                <p>Telephone: +30 123123123</p>
                <p>Email: contact-us@greenhand.com</p>
                <p>Street Address: Fictional Street 15</p>
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