<!-- contenu de la page principale utilisant template.php -->
<?php $title = 'Infinite Measures'; ?>

<?php ob_start(); ?>  <!-- Menu de la page home -->
<nav>
    <ul id="navigation">
        <li><a href="#Product" >Produit</a></li>
        <li><a href="#Statistiques" >Statistiques</a></li>
        <li><a href="#F.A.Q.">F.A.Q.</a></li>
        <li><a href="#Team">L'équipe</a></li>
        <li><a href="index.php?action=contact" >Contact</a></li>

        <div class = "connectLogo">
            <li>
                <a href="index.php?action=connect" class="connect"><img src="public/images/moncompte.png" id = "logoMoncompte">
                    <?php session_start();
                    if(isset($_SESSION['ID'])){
                        echo $_SESSION['pseudo'];
                    }
                        elseif (isset($_SESSION['IDmanager'])){
                        echo 'Espace manager';
                    }
                    else{
                        echo 'Se connecter';}
                    ?></a>
            </li>
        </div>
    </ul>
</nav>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>  <!-- contenu de la page home -->
<figure>
    <img src="public/images/formule1.jpeg" class= "bannerImage" />
</figure>


<section>
    <h2 id="Product">Produit</h2>

    <article>
        <p>Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in  proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.

        </p>
        <img src="public/images/produit.png" class= "bannerImage">
        <p>
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
        </p>
    </article>

    <h2 id="Statistiques">Statistiques</h2>
    <article>

        <p>Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
        </p>
        <img src="public/images/statistiques.png" class= "bannerImage">
        <p>
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
        </p>
    </article>

    <h2 id="F.A.Q.">F.A.Q.</h2>
    <article id="questionArticle">
        <div class="parent">
            <p class="question">- Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus ?</p>
            <div class="enfant">
                <p class="reponse">Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
               </p>
            </div>
        </div>

        <div class="parent">
            <p class="question">- Praefectis quieti culpa aperta agens culpa in tandem ?</p>
            <div class="enfant">
                <p class="reponse">Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
               </p>
            </div>
        </div>
        <div class="parent">
            <p class="question">- Illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem i ?</p>
            <div class="enfant">
                <p class="reponse">Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
             </p>
            </div>
        </div>
        <div class="parent">
            <p class="question">- Unibus culpa discessurum: agens homines omni minabatur  ?</p>
            <div class="enfant">
                <p class="reponse">Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
                </p>
            </div>
        </div>

        <div class="parent">
            <p class="question">- Cum innocentium culpa saepeque provincias innocentium minabatu culpa aperta a  ?</p>
            <div class="enfant">
                <p class="reponse">Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
                </p>
            </div>
        </div>

    </article>

    <h2 id="Team">L'équipe</h2>
    <article>
        <p>Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
            Cum innocentium culpa saepeque provincias innocentium minabatur inmunibus culpa discessurum: agens homines omni minabatur praefectis quieti culpa aperta agens culpa in tandem aperta inmunibus omni malivolus coalitos id gemens homines aerumnas pro minabatur gemens proiectare proiectare cum saepeque ut id agens innocentium perquisitor malivolus praefectis minabatur illas saepeque innocentium graviter ab minabatur cum non ab innocentium pro tandem in desineret illas discessurum: in in proiectare ab ut parceretur proiectare ut parceretur coalitos agens proiectare se discessurum: minabatur aperta ut agens graviter id ut aperta agens gemens gemens ab parceretur omni obsecrans gemens innocentium perquisitor provincias malivolus provincias graviter homines id.
        </p>
    </article>

</section>

<?php $content = ob_get_clean(); ?>


<?php $footer_link ='index.php?action=CGU' ?>
<?php $label_footer_link ="conditions générales d'utilisation" ?>

<?php require('mainTemplate.php'); ?>
