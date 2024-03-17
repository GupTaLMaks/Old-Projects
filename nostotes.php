<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/nostotes.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<title>Tote World</title>
</head>
<body>

    <?php include_once('header.inc') ?>

    <section class="vide"></section>

    <section class="nostotes">
        <h3>NOS TOTES</h3>
        <p class="texte">Les tote bags écoresponsables de ToteWorld sont fabriqués avec 100% de coton biologique.<br>
        Composé d’un coton épais de 340g/m², ils sont idéaux pour transporter toutes vos affaires avec style et respect de l’environnement. </p>
    </section>
    
    <section class="sec1tote" >
        <div class="recherche">
            <p style="text-transform: uppercase;">Quel design vous correspond ?</p>
        </div>

        <form novalidate="novalidate" onsubmit="returnfalse;" class="searchbox">
            <div role="search" class="searchbox__wrapper">
              <input id="search-input" type="search" name="search" placeholder="Rechercher un design..." autocomplete="off" required="required" class="searchbox__input">
              <span type="submit" class="loupe" >
              <svg role="img" aria-label="Search">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#sbx-icon-search-13"></use>
                  </svg>
                </span>
              <button type="reset" title="Clear the search query." class="searchbox__reset hide">
              <svg role="img" aria-label="Reset">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#sbx-icon-clear-3"></use>
                </svg>
              </button>
            </div>
        </form>
        
        <div class="svg-icons" style="height: 0; width: 0; position: absolute; visibility: hidden">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 100%;">
                    <symbol id="sbx-icon-clear-3" viewBox="0 0 40 40"><path d="M16.228 20L1.886 5.657 0 3.772 3.772 0l1.885 1.886L20 16.228 34.343 1.886 36.228 0 40 3.772l-1.886 1.885L23.772 20l14.342 14.343L40 36.228 36.228 40l-1.885-1.886L20 23.772 5.657 38.114 3.772 40 0 36.228l1.886-1.885L16.228 20z" fill-rule="evenodd"/></symbol>
                    <symbol id="sbx-icon-search-13" viewBox="0 0 40 40"><path d="M26.806 29.012a16.312 16.312 0 0 1-10.427 3.746C7.332 32.758 0 25.425 0 16.378 0 7.334 7.333 0 16.38 0c9.045 0 16.378 7.333 16.378 16.38 0 3.96-1.406 7.593-3.746 10.426L39.547 37.34c.607.608.61 1.59-.004 2.203a1.56 1.56 0 0 1-2.202.004L26.807 29.012zm-10.427.627c7.322 0 13.26-5.938 13.26-13.26 0-7.324-5.938-13.26-13.26-13.26-7.324 0-13.26 5.936-13.26 13.26 0 7.322 5.936 13.26 13.26 13.26z" fill-rule="evenodd"/></symbol>
            </svg>
        </div>
        <script>
        var client = algoliasearch("FD9ZD4RJYY", "fc3ae57e3e0fb2d703ae9e62a0c5b7c1")
          var index = client.initIndex('vetos');
          var myAutocomplete = autocomplete('#search-input', {hint: false}, [
            {
              source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
              displayKey: 'nom_veto',
              templates: {
                suggestion: function(suggestion) {
                  if(!suggestion.photo){
                     var url_photo = "https://www.daloavet.com/wp-content/uploads/2020/05/blank-profile-picture.png"
                  }
                  else{
                     var url_photo = suggestion.photo;
                  }
        
                  var sugTemplate = "<img src='"+ url_photo +"'/><span><p>"+ suggestion._highlightResult.nom_veto.value + "</p><p>"+ suggestion.clinique +"</p></span>";
                  return sugTemplate;
                },
                footer: '<div class="pasdeveto"><a href="https://daloavet.com/autre-praticien"> Votre vétérinaire ne figure pas dans la liste ? Cliquez ici.</a></div>'
              }
            }
          ]).on('autocomplete:selected', function(event, suggestion, dataset) {
            //console.log(suggestion, dataset);
            var veto_url;
            if(!suggestion.pageURL){
              veto_url = "https://daloavet.com/autre-praticien";
            }
            else{
              veto_url = suggestion.pageURL;
            }
            window.location.assign(veto_url);
          });
        
        
        document.querySelector(".searchbox [type='reset']").addEventListener("click", function() {
            document.querySelector(".aa-input").focus();
            this.classList.add("hide");
            myAutocomplete.autocomplete.setVal("");
        });
        
        document.querySelector("#search-input").addEventListener("keyup", function() {
            var searchbox = document.querySelector(".aa-input");
            var reset = document.querySelector(".searchbox [type='reset']");
            if (searchbox.value.length === 0){
                reset.classList.add("hide");
            } else {
              reset.classList.remove('hide');
          }
        });
        </script>
    </section>
    <section id="stw">
        <h3 id="text">EDITION LIMITÉE</h3> 
        <img id="save" src="images/imgs/toteecolo.png" style="width: 100%; height: 100%;"/>
    </section>

    <section class="stw">
        <div class="collection">
                <h3>SAVE THE WORLD</h3>
            </div>
        <div class="totes">
            <?php
           
            require_once('model/Produit.class.php');
                $c=Produit::showCollection(1);
                foreach($c as $v){
                    echo "$v";
                }
            ?>
        </div>
    </section>

    <section class="theme">
        <h3 id="text">NOS THEMES</h3> 
        <img id="themeimg" src="images/imgs/img2.png" style="width: 100%;"/>
    </section>
    <section id="collections">
        <div>
            <div class="collection">
                <h3>FLOWERS OF THE WORLD</h3>
            </div>
            <div class="totes">
               <?php
                require_once('model/Produit.class.php');
                $c=Produit::showCollection(2);
                foreach($c as $v){
                    echo "$v";
                }
                ?>     
            </div>
        </div>

        <div>
            <div class="collection">
                <h3>SUNNY DAYS</h3>
            </div>
            <div class="totes">
               <?php
                require_once('model/Produit.class.php');
                $c=Produit::showCollection(3);
                foreach($c as $v){
                    echo "$v";
                }
                ?>     
            </div>
        </div>
    </section>

    <section class="vide"></section>

    <?php include_once('footer.inc') ?>


</body>
</html>