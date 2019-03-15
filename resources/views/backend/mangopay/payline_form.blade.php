<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<style type= “text/css“>

    #PaylineForm {
        font-family:Tahoma, sans-serif;
        font-size: 76%;
        margin:0 auto;
        width:750px;
    }

    #PaylineForm h2 {
        margin: 0;
        padding:0;
        font-size: 1em;
        line-height:1.5em;
        color:orange;
    }

    #PaylineForm h3 {
        margin: 0;
        margin-bottom:.5em;
        font-size: 1em;
        font-weight: bold;
        color:#333;
    }

    #PaylineForm input[type=radio],
    #PaylineForm label,
    #PaylineForm label img,
    .checkable * {
        vertical-align:middle;
    }

    #PaylineForm form {
        margin:0;
    }

    /* Panel contenant les champs */

    #PaylineForm .pane {
        padding:.5em;
        margin-bottom:.5em;
        background-color: #efefef;
        border: 1px solid orange;
    }

    #PaylineForm div.radio {
        margin-bottom:.5em;
    }

    /* Bouton de validation*/

    #PaylineForm #submitButton {
        background-color:orange;
        color:white;
        font-weight: bold;
    }

    /* Bouton d'annulation */

    #PaylineForm #cancelButton {
        background-color:orange;
        color:white;
    }

    /* Message de feed-back de paiement */

    .paymentmessage {
        text-align:center;
        background: #fefefe;
        line-height: 3em;
    }

    /* Zone contenant le bouton */

    #actionButtons {
        text-align: center;
    }

    /* Messages d'erreur */

    #PaylineForm ul.errors,
    #PaylineForm ul.errors li {
        margin:0;
        padding:0;
        list-style: none;
    }

    #PaylineForm ul.errors {
        padding:.5em
        margin-bottom:1em;
        color:red;
        background-color: #ffe;
        border:1px solid #ccc;
    }

    /* Champs désactivés */

    .disabled {
        background-color: #fafafa;
    }



</style>
<body>

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-4 pt-3 mx-auto text-center">
        <div class="text-center">
            <a class="" href="{{ asset('/') }}">
                <img src="https://www.trustfy.io/img/trustfy-green.png" width="200px" alt="Trustfy Freelancer Payment">
            </a>
        </div>
    </div>
</div>

<div id="PaylineForm"></div>

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-4 pt-3 mx-auto text-center">
        <div class="text-center">
            <a class="" href="{{ asset('/') }}">
                <img src="https://www.mangopay.com/terms/powered-by-mangopay.png" width="500px" alt="Trustfy Freelancer Payment">
            </a>
        </div>
    </div>
</div>
</body>

</html>