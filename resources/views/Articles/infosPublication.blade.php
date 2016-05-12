@extends ('../Template.layout')

@section('titre') @endsection

@section('contenu')
<div class="z-depth-3">
    <div class="container">
        <div class="section">
            <div class="row">
                <h2 class="josefin-bold">Réglements & conseils</h2>
                <div class='col s8'>
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Conditions pour les auteurs</h5></div>
                        <div class="collapsible-body">
                            <p>Les pages de la revue sont ouvertes en priorité à tout membre en règle de cotisation. Il sera demandé un supplément aux (co)auteurs souhaitant publier sans être membre. 
                            <br>La participation financière de chaque auteur ou coauteur est calculée en fonction du nombre de planches en couleurs et de pages (dans la forme définitive) (Calcul des frais). Elle donne droit automatiquement à 10 tirés à part (par article) envoyés au premier auteur et une copie pdf moyennant l'accord préalable de chaque auteur de respecter la chartre d'utilisation des documents en pdf (Appendice E) . 
                            <br><br>Les frais de publication sont demandés au premier auteur, seul responsable devant la revue du paiement global et unique (par article) en cas de coautorat. 
                            <br>Les priorités sont établies selon les règles - " en ordre de paiement " et - " premier arrivé, premier servi ". 
                            <br>Les copyrights sur les articles, particulièrement sur les illustrations, appartiennent à Lambillionea. Toute diffusion, autre que par les tirés à part, est prohibée sans accord explicite de la revue, particulièrement la mise à disposition de copie numérique sur Internet ou par un autre canal numérique ou tout procédé de reproduction(voir aussi Appendice E).
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Conditions pour les articles</h5></div>
                        <div class="collapsible-body">
                            <p>Les auteurs veilleront à respecter la bienséance, l’esprit de la société et à respecter les règles et l’esprit du <a href="http://www.nhm.ac.uk/hosted-sites/iczn/code/">Code International de Nomenclature Zoologique</a>.
                            <br>Chaque article sera soumis à l’approbation du comité de rédaction de la revue. La mise en page est de la responsabilité de l’éditeur (voir aussi Appendice D). Les articles seront rédigés en français, anglais, espagnol, italien ou allemand.
                            <br><br>Ceux à caractère scientifique comporteront au moins :
                            <br>Le titre
                            <br>Le noms des auteurs et leur adresse
                            <br>Deux (ou plus) résumés (un en anglais, l'autre dans la langue de l'article, …)
                            <br>Les mots-clés (voir + bas)
                            <br>Les abréviations
                            <br>Une introduction
                            <br>Le corps
                            <br>Une discussion et/ou une conclusion
                            <br>La bibliographie (voir Appendice C pour la forme obligatoire minimale de la bibliographie).
                            <br><br>Les articles seront envoyés pour soumission au comité de rédaction dans leur forme définitive. Celle-ci comportera une copie sur papier, une copie numérique dans un format PC avec les dessins, graphiques et photos couleur (ou N/B) dûment légendés (soit imprimés, soit numérisés sur CD pour les photos, en résolution de 300 dpi minimum, non extrapolés). Le montage des planches incomplètes, non mises en forme correctement ou nécessitant des manœuvres inhabituelles peut entraîner des frais qui vont automatiquement à charge de l'auteur. 
                            <br>Une fois l'article accepté (parfois moyennant quelques modifications demandés par l'éditeur), il ne sera renvoyé qu'une seule fois à l'auteur avec possibilité de corrections mineures. La mise en forme définitive se fait selon les exigences de la mise en page particulière à chaque numéro et elle est de la responsabilité de l'éditeur. 
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Hors séries et suppléments</h5></div>
                        <div class="collapsible-body">
                            <p>La société édite aussi des révisions, des articles volumineux (+ de 15 pages) ou des suppléments d'au moins 16 pages comme supplément payant ou non (renseignements au secrétariat et conditions financières au cas par cas).</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Calcul des frais</h5></div>
                        <div class="collapsible-body">
                            <p>Le calcul des frais de participation se calcule :
                            <br><br>Sur le nombres de pages total de l'article = P
                            <br>Le nombres de planches couleurs = C
                            <br>Les frais de poste et colisage = FP
                            <br>Les frais extraordinaires de mise en page = FE
                            <br>Auteur(s) non membres * = ANM
                            <br>Selon la formule (total exprimé en €)
                            <br>(P X 2,5 €) + (C X 30 €) + FP + FE + (ANM X 30 €)
                            <br>Si la somme est inférieure à 25 €, un forfait de base de 25 € sera facturé automatiquement
                            <br>* : un supplément de 30 € par auteur non membre de l'association.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Les mots-clés</h5></div>
                        <div class="collapsible-body">
                            <p>Les mots-clés seront cités selon l'ordre suivant : ordre, famille, sous-famille, tribu, genre, espèce, n. sp., comb. nov., zone géographique, pays, new records.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Références bibliographiques</h5></div>
                        <div class="collapsible-body">
                            <p>Les références bibliographiques comporteront au moins les informations suivantes et de préférence sous la forme suivante : 
                            <br>ANTOINE, Ph., BEINHUNDER, G. & LEGRAND, J.-Ph., 2003. - Contribution à la connaissance du genre Rhabdotis Burmeister (Coleoptera, Cetoniidae). I : le groupe de Rhabdotis picta (F.). Coléoptères , 9 (22) : 315-346.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Mise en page</h5></div>
                        <div class="collapsible-body">
                            <p>Les tableaux sont déconseillés sauf dans le cas de comparaison. 
                            <br>La première citation d'un nom dans le résumé et le texte se fera sous forme binomiale (ou trinomiale) complète avec auteur et date. 
                            <br>Tout nom suivi de son statut tels que n. sp., n. ssp. , stat. rev., nom. nov. est en caractère normal dans tout le texte. 
                            <br>Pour les descriptions de nouveau noms, l'auteur devrait se référer à l'article 16 du CINZ.</p>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><h5 class="blue-text josefin-regular"><img src="media/icons/mfglabs-label.png" alt="label" style="margin-right: 20px">Règlement</h5></div>
                        <div class="collapsible-body">
                            <p>Lambillionea offre la possibilité aux auteurs d’obtenir une copie pdf de leur travail sous certaines conditions. Ces conditions sont mentionnées ci-dessous. Si vous n’acceptez pas cette charte (voir ci-dessous), vous ne pourrez pas utiliser de pdf de votre travail de quelle que manière que ce soit. Les travaux concernés sont les articles “normaux” qui ne sont pas des monographies, numéros spéciaux, etc. Les auteurs recevront donc dorénavant 10 TAP en format papier et, s’ils le souhaitent (et moyennant l’accord du présent règlement), une copie pdf  “marquée”.</p>
                            <p>- Aucune partie de la publication ne peut être reproduite sous quelque forme que ce soit, ni être stockée, utilisée, propagée et distribuée par une méthode ou un média électronique sans accord écrit et explicite de l’éditeur.
                            <br>- Les auteurs qui reçoivent une version pdf du travail ne peuvent l’utiliser que pour un échange privé avec des collègues et uniquement sur demande individuelle. Ce qui signifie qu’il ne peut être distribué via un email général et/ou par une liste d’adresses email préalablement établie, même en utilisant la méthode « cci » avec envoi à soi-même ou une technique similaire.
                            <br>- Son accès online sur Internet ( sensu lato ) est complètement prohibé sauf accord explicite et écrit de l’éditeur. Sont aussi concernées toutes formes de l’article qui aurait été remanié, découpé, reformaté, etc..
                            <br>- L’auteur qui reçoit la copie reste responsable de son devenir et du non respect éventuel du règlement par un tiers qui utiliserait la copie.
                            <br>- Le non respect ou le détournement du précédent règlement entraîne la radiation comme auteur et comme abonné. De plus, la société se réserve le droit d’engager toute action qu’elle jugerait utile devant les autorités compétentes avec demande de dommages et intérêts.
                            <br>- Les frais de participation des auteurs restent inchangés.</p>
                            <p>Si vous souhaitez recevoir un pdf de votre travail, il vous sera demander marquer votre accord au présent règlement et de renvoyer par  email (possédant une valeur juridique) avec mention « lu et approuvé » suivi de votre nom et prénom complets. Cet email tiendra lieu de contrat passé entre vous et notre société. Vous pouvez aussi nous envoyer une copie papier dûment signée de cet email avec la mention « lu et approuvé » suivie de votre nom et prénom complets. Cet accord concernera tout travail de l’auteur au sein de la société.
                            <br>Si un travail est signé par plusieurs auteurs, ceux-ci doivent tous marquer leur accord.</p>
                        </div>
                    </li>
                </ul>
                </div>
                
                <div class='col s4 center' style='margin-top: 0.5rem'>
                    <div class='col s12'>
                        <a href="{{route('ProposeArticle')}}" class="btn btn-large btn-bleu modal-trigger col s10">Proposer un article</a>
                    </div>
                    <div class='col s12'>
                        <a href="#modal1" class="btn btn-large btn-bleu modal-trigger col s8">Abonnez-vous</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     


@push('javascript')
<script>

    $(document).ready(function(){

       // $('.modal-trigger').leanModal();

       // $('#header').load('modals.html');

        $('.collapsible-header').click(function(){
            $('.collapsible-header .active').removeClass('active');
            $(this).addClass('active');
        });

        $('.collapsible-header .active').click(function(){
            $(this).removeClass('active');
        });
    });
</script>
@endpush
@endsection