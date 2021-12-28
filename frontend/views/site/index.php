<?php

/* @var $this yii\web\View */

$this->title = 'Healthify - Home';

?>

<nav id="float">
    <a class="nav-link" href="javascript:;" id="homeButton" onclick="onLinkClick(this.id);">Home</a>
    <a class="nav-link" href="javascript:;" id="aboutButton" onclick="onLinkClick(this.id);">About</a>
    <a class="nav-link" href="javascript:;" id="menuButton" onclick="onLinkClick(this.id);">Menu</a>
    <a class="nav-link" href="javascript:;" id="contactButton" onclick="onLinkClick(this.id);">Contact</a>
</nav>


<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <img src="/healthify/frontend/web/img/menuBg.jpg" class="customBackground" alt="Menu Image">

    <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
        <span class="w3-tag">Open from <?php echo date('l jS \of F Y h:i:s A'); ?></span>
    </div>
    <div class="w3-display-middle w3-center">
        <span class="w3-text-black" style="font-size:90px">Healthify</span>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
        <span class="w3-tag">15 Adr street, 5015</span>
    </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

    <!-- About Container -->
    <div class="w3-container" id="about">
        <div class="w3-content" style="max-width:700px">
            <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT HEALTHIFY</span></h5>
            <p>The Cafe was founded in Leiria by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>In addition to our full espresso and brew bar menu, we serve fresh made-to-order breakfast and lunch
                sandwiches, as well as a selection of sides and salads and other good stuff.</p>
            <div class="w3-panel w3-leftbar w3-light-grey">
                <p><i>"Use products from nature for what it's worth - but never too early, nor too late." Fresh is the
                        new sweet.</i></p>
                <p>Chef, Coffeeist and Owner: Liam Brown</p>
            </div>
            <img src="/healthify/frontend/web/img/placeholder.png" style="width:100%;max-width:1000px"
                 class="w3-margin-top" alt="Menu Image">
            <p><strong>Opening hours:</strong> everyday from 6am to 5pm.</p>
            <p><strong>Address:</strong> 15 Adr street, 5015, NY</p>
        </div>
    </div>

    <!-- Menu Container -->
    <div class="w3-container" id="menu">
        <div class="w3-content" style="max-width:700px">

            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>

            <div class="w3-row w3-center w3-card w3-padding">
                <a href="javascript:void(0)" onclick="openMenu(event, 'Entradas');" id="myLink">
                    <div class="w3-col s6 tablink">Entradas</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Sopas');" id="myLink">
                    <div class="w3-col s6 tablink">Sopas</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Pratos');">
                    <div class="w3-col s6 tablink">Pratos</div>
                </a>
                <a href="javascript:void(0)" onclick="openMenu(event, 'Sobremesas');">
                    <div class="w3-col s6 tablink">Sobremesas</div>
                </a>
            </div>

            <div id="Entradas" class="w3-container menu w3-padding-48 w3-card">
                <?php
                if($entradas!=null){
                    foreach ($entradas as $entrada){
                        echo '<h5>'.$entrada['name'].'</h5>';
                        echo'<p class="w3-text-grey">'.$entrada['description'].' '.$entrada['price'].'€</p><br>';
                    }
                }else
                    echo '<h3>Sem ementa inserida nesta categoria</h3>';
                ?>
            </div>

            <div id="Sopas" class="w3-container menu w3-padding-48 w3-card">
                <?php
                if($sopas!=null){
                    foreach ($sopas as $sopa){
                        echo '<h5>'.$sopa['name'].'</h5>';
                        echo'<p class="w3-text-grey">'.$sopa['description'].' '.$sopa['price'].'€</p><br>';
                    }
                }else
                    echo '<h3>Sem ementa inserida nesta categoria</h3>';
                ?>
            </div>

            <div id="Pratos" class="w3-container menu w3-padding-48 w3-card">
                <?php
                if($pratos!=null){
                    foreach ($pratos as $prato){
                        echo '<h5>'.$prato['name'].'</h5>';
                        echo'<p class="w3-text-grey">'.$prato['description'].' '.$prato['price'].'€<br>'.$prato['categoryid'].'</p><br>';
                    }
                }else
                    echo '<h3>Sem ementa inserida nesta categoria</h3>';
                ?>
            </div>

            <div id="Sobremesas" class="w3-container menu w3-padding-48 w3-card">
                <?php
                if($sobremesas!=null){
                    foreach ($sobremesas as $sobremesa){
                        echo '<h5>'.$sobremesa['name'].'</h5>';
                        echo'<p class="w3-text-grey">'.$sobremesa['description'].' '.$sobremesa['price'].'€</p><br>';
                    }
                }else
                    echo '<h3>Sem ementa inserida nesta categoria</h3>';
                ?>
            </div>

            <img src="/healthify/frontend/web/img/placeholder.png" style="width:100%;max-width:1000px;margin-top:32px;" alt="Menu Image">
        </div>
    </div>

    <!-- Contact/Area Container -->
    <div class="w3-container" id="where" style="padding-bottom:32px;">
        <div class="w3-content" style="max-width:700px">
            <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">WHERE TO FIND US</span></h5>
            <p>Find us at some address at some place.</p>
            <img src="/healthify/frontend/web/img/placeholder.png" class="w3-image" style="width:100%">
            <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We
                understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look
                and taste.</p>
            <p><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
            <form action="" target="_blank">
                <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name">
                </p>
                <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required
                          name="People"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time"
                          required name="date" value="2020-11-16T18:00"></p>
                <p><input class="w3-input w3-padding-16 w3-border" type="text"
                          placeholder="Message \ Special requirements" required name="Message"></p>
                <p>
                    <button class="w3-button w3-black" type="submit" disabled>SEND MESSAGE</button>
                </p>
            </form>
        </div>
    </div>

    <!-- End page content -->
</div>

